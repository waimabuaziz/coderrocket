Insert Into staff_earn_result (Staff_ID,BC_ID,Quarter,Year,Earn,ProductGroup_ID)
SELECT 
         Earn_block.Staff_ID  
          , bc.BC_ID 
          , Earn_block.Quarter 
          , Earn_block.Year  
          ,sum(Earn_block.TotalAmount) as Earn 
          , Earn_block.ProductGroup_ID  
 FROM 
        (
            SELECT '1' as ProductGroup_ID,  Staff_ID , sum( CAST(TotalAmount_LYD AS DECIMAL(10,2))) as  TotalAmount , Year , Quarter  FROM `upload_cash_recharge`  where Year = $p_year and Quarter = $p_quarter  
            group by staff_id , Year , Quarter 
            Union ALL
            SELECT '1' as ProductGroup_ID ,  Staff_ID , sum( CAST(Charge AS DECIMAL(10,2))) as  TotalAmount , Year , Quarter  FROM `upload_package_sale`  where Year = $p_year and Quarter = $p_quarter
            group by staff_id , Year , Quarter 
            Union ALL
            SELECT '1' as ProductGroup_ID,  Staff_ID , sum( CAST(TotalAmount AS DECIMAL(10,2))) as  TotalAmount , Year , Quarter  FROM `upload_subscription_report`  where Year = $p_year and Quarter = $p_quarter
            group by staff_id , Year , Quarter 
        ) Earn_block 
LEFT JOIN employees emp ON Earn_block.Staff_ID = emp.Staff_ID
LEFT JOIN bc bc ON substr(Earn_block.Staff_ID,1,3) = bc.ZTE_ID
  -- WHERE  @par12 != 'GGGGGGGg' ; 
GROUP BY Earn_block.Staff_ID    , Earn_block.Year  , Earn_block.Quarter   , bc.BC_ID  , Earn_block.ProductGroup_ID  
ORDER BY bc.BC_ID , Earn_block.Staff_ID
  
