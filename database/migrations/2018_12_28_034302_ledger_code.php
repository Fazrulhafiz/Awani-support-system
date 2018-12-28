<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LedgerCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gl_code', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gl_code')->unique();
            $table->string('gl_name');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });

        // Insert default data
        $data = array(
            array('gl_code'=>'71020001', 'gl_name'=>'Prodn Cost - Talent/guest'),
            array('gl_code'=>'71020003', 'gl_name'=>'Prodn Cost - Director\'s team (freelance)'),
            array('gl_code'=>'71020004', 'gl_name'=>'Prodn Cost - Others (freelance)'),
            array('gl_code'=>'71020005', 'gl_name'=>'Prodn Cost - Music'),
            array('gl_code'=>'71020007', 'gl_name'=>'Prodn Cost - Catering'),
            array('gl_code'=>'71020008', 'gl_name'=>'Prodn Cost - Consultancy'),
            array('gl_code'=>'71020009', 'gl_name'=>'Prodn Cost - News Feeds &'),
            array('gl_code'=>'71020010', 'gl_name'=>'Prodn Cost - Contestant Prizes'),
            array('gl_code'=>'71020011', 'gl_name'=>'Prodn Cost - Sponsored Prizes'),
            array('gl_code'=>'71020012', 'gl_name'=>'Prodn Cost - Transport'),

            array('gl_code'=>'71020013', 'gl_name'=>'Prodn Cost - Site Rental'),
            array('gl_code'=>'71020096', 'gl_name'=>'Production expenses (interco)'),
            array('gl_code'=>'71020099', 'gl_name'=>'Prodn Cost - Miscellaneous'),
            array('gl_code'=>'71021001', 'gl_name'=>'Prodn Materials - Set'),
            array('gl_code'=>'71021002', 'gl_name'=>'Prodn Materials - Props  '),
            array('gl_code'=>'71021004', 'gl_name'=>'Prodn Materials - Cosmetic/Hair supplies'),
            array('gl_code'=>'71021005', 'gl_name'=>'Prodn Materials - Wardrobe'),
            array('gl_code'=>'71021006', 'gl_name'=>'Prodn Materials - Video & Audiotapes'),
            array('gl_code'=>'71021099', 'gl_name'=>'Prodn Materials - Others'),
            array('gl_code'=>'71022002', 'gl_name'=>'Prodn Services - Graphics services'),

            array('gl_code'=>'71022003', 'gl_name'=>'Prodn Services - Stringer'),
            array('gl_code'=>'71022008', 'gl_name'=>'Prodn Services - Storage'),
            array('gl_code'=>'71022099', 'gl_name'=>'Prodn Services - Others  '),
            array('gl_code'=>'71023001', 'gl_name'=>'Prodn Equipmt - Sound'),
            array('gl_code'=>'71023002', 'gl_name'=>'Prodn Equipmt - Lighting & Power'),
            array('gl_code'=>'71023003', 'gl_name'=>'Prodn Equipmt - Cameras / PSC'),
            array('gl_code'=>'71023008', 'gl_name'=>'Prodn Equipmt - Generator'),
            array('gl_code'=>'71023099', 'gl_name'=>'Prodn Equipmt - Others'),
            array('gl_code'=>'71050010', 'gl_name'=>'COS - Interactive'),
            array('gl_code'=>'71055010', 'gl_name'=>'Transmission Cost'),

            array('gl_code'=>'72102002', 'gl_name'=>'Materials - Events'),
            array('gl_code'=>'72102003', 'gl_name'=>'Materials - Merchandising'),
            array('gl_code'=>'72102006', 'gl_name'=>'Materials - Merchandising'),
            array('gl_code'=>'72103010', 'gl_name'=>'PR/Promo/MR-Functions/Eve'),
            array('gl_code'=>'72103990', 'gl_name'=>'PR - Others'),
            array('gl_code'=>'72105990', 'gl_name'=>'Advert Media - Others'),
            array('gl_code'=>'72106990', 'gl_name'=>'Advert Prodn - Others'),
            array('gl_code'=>'72109020', 'gl_name'=>'Entertainment'),
            array('gl_code'=>'72109030', 'gl_name'=>'Representation & gifts'),
            array('gl_code'=>'73001150', 'gl_name'=>'LS - Hdphone'),

            array('gl_code'=>'73004010', 'gl_name'=>'Staff Welfare - Food and Refreshment'),
            array('gl_code'=>'73004030', 'gl_name'=>'Staff Welfare - Uniforms,'),
            array('gl_code'=>'73004040', 'gl_name'=>'Staff Welfare - Staff Fun'),
            array('gl_code'=>'73004050', 'gl_name'=>'Staff Welfare - Flexible '),
            array('gl_code'=>'73004990', 'gl_name'=>'Staff Welfare - Others'),
            array('gl_code'=>'75010010', 'gl_name'=>'Audit Fees - Statutory Audit'),
            array('gl_code'=>'76030020', 'gl_name'=>'Low Value Assets - Computer related'),
            array('gl_code'=>'76030021', 'gl_name'=>'LVA - Furniture'),
            array('gl_code'=>'76030023', 'gl_name'=>'Low Value Assets - Telecommunication Eq'),
            array('gl_code'=>'76030024', 'gl_name'=>'LVA -Audio Visual Eq'),

            array('gl_code'=>'76030025', 'gl_name'=>'Low Value Assets - Others'),
            array('gl_code'=>'77010010', 'gl_name'=>'Office Maintenance Services'),
            array('gl_code'=>'77010013', 'gl_name'=>'Office and general expens'),
            array('gl_code'=>'77010020', 'gl_name'=>'Security Services'),
            array('gl_code'=>'77010040', 'gl_name'=>'Stationeries & Office Supplies'),
            array('gl_code'=>'77010050', 'gl_name'=>'Computer Related Consumables'),
            array('gl_code'=>'77010070', 'gl_name'=>'Toiletries and Store Sundries'),
            array('gl_code'=>'77010110', 'gl_name'=>'Utilities - Electricity &'),
            array('gl_code'=>'77010999', 'gl_name'=>'Others - Office Sundries'),
            array('gl_code'=>'77011099', 'gl_name'=>'Material & Supplies - Others'),

            array('gl_code'=>'77012001', 'gl_name'=>'Prints - Newspapers/Periodicals/Books'),
            array('gl_code'=>'77012099', 'gl_name'=>'Prints - Others'),
            array('gl_code'=>'77019099', 'gl_name'=>'Others - Misc'),
            array('gl_code'=>'77040010', 'gl_name'=>'Courier & Postage'),
            array('gl_code'=>'77040020', 'gl_name'=>'Shipping/Freight/Custom charges'),
            array('gl_code'=>'77050002', 'gl_name'=>'BM - Cleaning Services & '),
            array('gl_code'=>'77051001', 'gl_name'=>'BSM - Consumables & Spare'),
            array('gl_code'=>'77051002', 'gl_name'=>'BSM - Services'),
            array('gl_code'=>'77052001', 'gl_name'=>'ISM - Computer Hardware'),
            array('gl_code'=>'77052002', 'gl_name'=>'ISM - Computer Software'),

            array('gl_code'=>'77053001', 'gl_name'=>'OPEM - Motor Vehicles'),
            array('gl_code'=>'77053003', 'gl_name'=>'OPEM - Others'),
            array('gl_code'=>'77060010', 'gl_name'=>'Overseas Travel - Air Fares'),
            array('gl_code'=>'77060020', 'gl_name'=>'Overseas Travel - Land Transport'),
            array('gl_code'=>'77060030', 'gl_name'=>'Overseas Travel - Accomodation'),
            array('gl_code'=>'77060040', 'gl_name'=>'Overseas Travel - Meal Allowance'),
            array('gl_code'=>'77060990', 'gl_name'=>'Overseas Travel - Others'),
            array('gl_code'=>'77061010', 'gl_name'=>'Local Travel - Air fares'),
            array('gl_code'=>'77061020', 'gl_name'=>'Local Travel - Land Transport'),
            array('gl_code'=>'77061030', 'gl_name'=>'Local Travel - Accomodation'),

            array('gl_code'=>'77061040', 'gl_name'=>'Local Travel - Meal Allowance'),
            array('gl_code'=>'77061990', 'gl_name'=>'Local Travel - Others'),
            array('gl_code'=>'77091010', 'gl_name'=>'Other Expenses - Penalties & Fines'),
            array('gl_code'=>'77091020', 'gl_name'=>'Other Expenses - Laundry & Dry Cleaning'),
            array('gl_code'=>'77091040', 'gl_name'=>'GST Expense'),
            array('gl_code'=>'77101020', 'gl_name'=>'Insurance - General / Motor Vehicle'),
            array('gl_code'=>'77201010', 'gl_name'=>'Rental - Equipment'),
            array('gl_code'=>'77201020', 'gl_name'=>'Rental - Lease Equipment'),
            array('gl_code'=>'77201030', 'gl_name'=>'Rental - Office'),
            array('gl_code'=>'77201040', 'gl_name'=>'Rental - Motor Vehicle'),

            array('gl_code'=>'77201050', 'gl_name'=>'Rental - Storage'),
            array('gl_code'=>'77301990', 'gl_name'=>'Licences - Others'),
            array('gl_code'=>'77401990', 'gl_name'=>'Bank Charges & Others'),
            array('gl_code'=>'15205020', 'gl_name'=>'Staff Loan & Advances < 12 Months'),
            array('gl_code'=>'16001700', 'gl_name'=>'Petty Cash - RM'),
            array('gl_code'=>'69993011', 'gl_name'=>'Net realised Gain/Loss on Forex (COS)'),
            array('gl_code'=>'75020020', 'gl_name'=>'Leg/Stmp/filing fee'),
        );

        DB::table('gl_code')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gl_code');
    }
}
