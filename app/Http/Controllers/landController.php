<?php

namespace App\Http\Controllers;

use App\Lands;
use App\LUS;
use App\LUS_Assignation;
use App\LUS_Decision;
use Illuminate\Http\Request;

class landController extends Controller
{
    public function land(Request $request)
    {
        $l = new Lands();
        $l->LUS_id = $request->LUS_id;
        $l->LUS_ORG_id = $request->LUS_ORG_id;
        $l->User_id = $request->User_id;
        $l->ORG_id = $request->ORG_id;
        $l->Stage = $request->Stage;
        $l->Virtual = $request->Virtual;
        $l->Merged = $request->Merged;
        $l->Divided = $request->Divided;
        $l->Mortgage = $request->Mortgage;
        $l->Zero_Base = $request->Zero_Base;
        $l->General_Conditions = $request->General_Conditions;
        $l->Max_altitude = $request->Max_altitude;
        $l->North_RODOD = $request->North_RODOD;
        $l->South_RODOD = $request->South_RODOD;
        $l->West_RODOD = $request->West_RODOD;
        $l->East_RODOD = $request->East_RODOD;
        $l->Building_Percentage = $request->Building_Percentage;
        $l->P_East = $request->P_East;
        $l->P_West = $request->P_West;
        $l->P_South = $request->P_South;
        $l->P_North = $request->P_North;
        $l->Image_Path = $request->Image_Path;
        $l->BUiLD_DeNSITY = $request->BUiLD_DeNSITY;
        $l->save();
        return response()->json(['land', "saved"], 200);

    }

    public function lus(Request $request)
    {
        $l = new LUS();
        $l->ORG_id = $request->ORG_id;
        $l->Usage_Type_id = $request->Usage_Type_id;
        $l->OwnerShip_Type_id = $request->OwnerShip_Type_id;
        $l->user_id = $request->user_id;
        $l->Area = $request->Area;
        $l->Serial = $request->Serial;
        $l->Structure_id = $request->Structure_id;
        $l->National_Real_State_id = $request->National_Real_State_id;
        $l->Stop = $request->Stop;
        $l->Stop_Notes = $request->Stop_Notes;
        $l->Usage_Type_Child_id = $request->Usage_Type_Child_id;
        $l->Acc_Code = $request->Acc_Code;
        $l->Transaction_id = $request->Transaction_id;
        $l->Region = $request->Region;
        $l->Executive_Status = $request->Executive_Status;
        $l->Parent_LUS = $request->Parent_LUS;
        $l->Assign_Stage = $request->Assign_Stage;
        $l->Stop_Date = $request->Stop_Date;
        $l->Land_Sketch = $request->Land_Sketch;
        $l->Area_Origonal = $request->Area_Origonal;
        $l->LUS_Type_id = $request->LUS_Type_id;
        $l->Address_desc = $request->Address_desc;
        $l->Notes = $request->Notes;
        $l->LUS_Type_Child_Id = $request->LUS_Type_Child_Id;
        $l->Area_SHM = $request->Area_SHM;
        $l->Area_Carat = $request->Area_Carat;
        $l->Area_arce = $request->Area_arce;
        $l->Acre_Price = $request->Acre_Price;
        $l->Area_Meter = $request->Area_Meter;
        $l->Total_Price = $request->Total_Price;
        $l->Area_Type = $request->Area_Type;
        $l->Hood = $request->Hood;
        $l->Divide_letter = $request->Divide_letter;
        $l->SHM_Price = $request->SHM_Price;
        $l->Carat_Price = $request->Carat_Price;
        $l->Meter_Price = $request->Meter_Price;
        $l->CalcArea_Type = $request->CalcArea_Type;
        $l->East_Margin = $request->East_Margin;
        $l->West_Margin = $request->West_Margin;
        $l->South_Margin = $request->South_Margin;
        $l->North_Margin = $request->North_Margin;
        $l->East_Margin_Length = $request->East_Margin_Length;
        $l->West_Margin_Length = $request->West_Margin_Length;
        $l->South_Margin_Length = $request->South_Margin_Length;
        $l->North_Margin_Length = $request->North_Margin_Length;
        $l->General_Conditions = $request->General_Conditions;
        $l->IN_Courdon = $request->IN_Courdon;
        $l->IN_Building_Area = $request->IN_Building_Area;
        $l->D_West = $request->D_West;
        $l->D_East = $request->D_East;
        $l->D_South = $request->D_South;
        $l->D_North = $request->D_North;
        $l->Inhabitants_Accept_Number = $request->Inhabitants_Accept_Number;
        $l->Inhabitants_Physical = $request->Inhabitants_Physical;
        $l->Workers_Number = $request->Workers_Number;
        $l->Project_Type_id = $request->Project_Type_id;
        $l->North_RODOD = $request->North_RODOD;
        $l->South_RODOD = $request->South_RODOD;
        $l->West_RODOD = $request->West_RODOD;
        $l->East_RODOD = $request->East_RODOD;
        $l->P_West = $request->P_West;
        $l->P_East = $request->P_East;
        $l->P_South = $request->P_South;
        $l->P_North = $request->P_North;
        $l->Rent_Value = $request->Rent_Value;
        $l->Payment_Type_id = $request->Payment_Type_id;
        $l->Law_id = $request->Law_id;
        $l->deleted = $request->deleted;
        $l->Old_Module = $request->Old_Module;
        $l->LUS_Location = $request->LUS_Location;
        $l->Assign_Serial = $request->Assign_Serial;
        $l->State_id = $request->State_id;
        $l->save();

        return response()->json(['lus', "saved"], 200);


    }
    public function lusDecision(Request $request)
    {
        $l = new LUS_Decision();
        $l->ORG_id = $request->ORG_id;
        $l->LUS_id = $request->LUS_id;
        $l->Decision_Number = $request->Decision_Number;
        $l->Decision_Date = $request->Decision_Date;
        $l->External_ORG = $request->External->ORG;
        $l->Notes = $request->Notes;
        $l->save();
        return response()->json(['lus decision', "saved"], 200);

    }

    public function lusAssignation(Request $request)
    {
        $l = new LUS_Assignation();
        $l->ORG_id = $request->ORG_id;
        $l->Assign_Number = $request->Assign_Number;
        $l->LUS_id = $request->LUS_id;
        $l->Distinction_Type_id = $request->Distinction_Type_id;
        $l->Transaction_id = $request->Transaction_id;
        $l->payment_id = $request->payment_id;
        $l->Module_id = $request->Module_id;
        $l->save();
        return response()->json(['lus assignation', "saved"], 200);
    }

}
