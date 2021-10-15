 
 Insert Into bc_target_result (BC_ID  ,BCName, Quarter , Year   , Others_Target , VC_Target , EC_Target , Others_Earn , VC_Earn , EC_Earn , ActiveEmpCount , BCReward ,BCAchivedPercent)

SELECT 
          b2.BC_ID 
        , b2.BCName 
        , b2.Quarter 
        , b2.Year 
        , b2.Others_Target 
        , b2.VC_Target 
        , b2.EC_Target 
        , b2.Others_Earn
        , b2.VC_Earn 
        , b2.EC_Earn 
        , b2.ActiveEmpCounts 

        , (
                 CASE WHEN(b2.Others_Earn / b2.Others_Target * 100 ) > $p_bc_req_achived_perc 
                 THEN (b2.Others_Earn / b2.Others_Target * 100 / 100  ) *  b2.ActiveEmpCounts * $p_const_bouns_per_emp 
                 ELSE $p_const_bouns_per_emp * 3  END
           ) AS BCReward

        , (b2.Others_Earn / b2.Others_Target * 100 ) AS BCAchivedPercent   

FROM 
(        
            Select  
                b1.BC_ID 
                , b1.BCName 
                , b1.Quarter 
                , b1.Year 
                , b1.Others_Target 
                , b1.VC_Target 
                , b1.EC_Target 
                , b1.Others_Earn
                , b1.VC_Earn 
                , b1.EC_Earn 
                , ( 
                                    select   ifnull(count(Staff_ID),0)  from  staff_earn_result  
                                    where  year =  $p_year
                                    and    Quarter = $p_quarter 
                                    and    earn >= (( $p_min_earned_percent / 100 ) *  b1.Others_Earn) 
                                    and    BC_ID =  b1.BC_ID  
                )  As ActiveEmpCounts


            From
                        (
                        Select  
                                  bct.BC_ID  as BC_ID
                                , bct.BCName  as BCName 
                                , $p_quarter as Quarter 
                                ,  bct.year   as Year
                                , sum(CASE WHEN bct.ProductGroup_ID  = '1' THEN bct.Target  ELSE 0 END) as Others_Target 
                                , sum(CASE WHEN bct.ProductGroup_ID  = '2' THEN bct.Target  ELSE 0 END ) as VC_Target 
                                , sum(CASE WHEN bct.ProductGroup_ID  = '3' THEN bct.Target  ELSE 0 END) as EC_Target 
                                , ifnull(stf_ern.Earn,0)  as  Others_Earn 
                            
                            , ifnull((select sum(TotalAmount) From  upload_system_sales ups 
                                        where ups.BCName = bct.BCName 
                                        and ups.CategoryName = 'بطاقات التعبئة'
                                        and ups.SubProductName in ('باقة كبيرة' , 'باقة صغيرة')
                                        and Month(STR_TO_DATE(ups.SaleDate, '%m/%d/%Y')) in ($p_m1,$p_m2,$p_m3)
                                        and Year(STR_TO_DATE(ups.SaleDate, '%m/%d/%Y')) =   $p_year
                                        ),0)
                                As VC_Earn
                            
                            ,ifnull((select sum(TotalAmount) From  upload_system_sales ups 
                                        where ups.BCName = bct.BCName 
                                        and ups.CategoryName = 'شحن الإلكتروني'
                                        and Month(STR_TO_DATE(ups.SaleDate, '%m/%d/%Y')) in ($p_m1,$p_m2,$p_m3)
                                        and Year(STR_TO_DATE(ups.SaleDate, '%m/%d/%Y')) =  $p_year
                                        ),0)
                                As EC_Earn
                        From    upload_bctarget     bct
                              --   (Select  upt.BC_ID , upt.ProductGroup_ID , upt.Month , upt.Year , upt.Target , upt.BCName  From upload_bctarget upt )  bct
                             Left join 
                                (Select BC_ID , sum(Earn) Earn From staff_earn_result  where year =  $p_year and Quarter = $p_quarter  group by BC_ID ) stf_ern
                            ON bct.BC_ID  = stf_ern.BC_ID 
                        Where bct.year =  $p_year and bct.Month in  ($p_m1,$p_m2,$p_m3)
                        Group by bct.BC_ID  , bct.BCName  , bct.year , stf_ern.Earn 
                        Order by bct.BC_ID
                        ) b1
)b2
