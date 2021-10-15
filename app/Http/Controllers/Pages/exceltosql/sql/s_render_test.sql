
Select 
  b1.BC_ID
, b1.BCName
, stfr.Staff_ID as Staff_ID
, emp.EmployeeNO as EmployeeNO
, emp.EmployeeName as EmployeeName
, emp.Email as Email
, stfr.Earn as EmpolyeeEarns
-- , CASE WHEN( stfr.Earn / b1.BCEarn * 100 ) > 1  THEN       concat(convert((round((stfr.Earn / b1.BCEarn * 100),0)) ,CHAR) ,'%')    ELSE '0%' END has_reward
,  concat(convert((round((stfr.Earn / b1.BCEarn * 100),0)) ,CHAR) ,'%')   as  has_reward
,  round(  (( stfr.Earn / b1.BCEarn * 100 ) / 100 ) *  b1.BCReward , 0 ) as EmployeeReward 
, b1.BCTarget
, b1.BCEarn 
, concat(convert((round((b1.BCAchivmentPerc),0)) ,CHAR) ,'%')   as BCAchivmentPerc
, b1.BCReward
From
        (
        SELECT 
              bc.BC_ID
            , bc.BCName as BCName
            , 'EmployeeReward' as EmployeeReward
            , btr.Others_Target as BCTarget
            , btr.Others_Earn  as BCEarn
            , btr.BCAchivedPercent as BCAchivmentPerc
            , btr.BCReward as BCReward
        From 
            bc_target_result btr 
        Left Join bc bc on bc.BC_ID = btr.BC_ID 
        ) b1 
left join staff_earn_result stfr ON b1.BC_ID = stfr.BC_ID 
left join employees emp ON stfr.Staff_ID = emp.Staff_ID
-- Where stfr.Staff_ID  is not null  and  emp.EmployeeName is not null 
Order by stfr.Staff_ID , emp.EmployeeName