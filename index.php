<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Central Dispatch Fetcher</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-docs.css">
        <script src="/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/styles.css">
    </head>
    <body>
        <div id='err_div'></div>
        <div id='info_div'></div>
        <span id="dummy"></span>
        <div class='search_selector_div'>
            <label for='update_timer'>Timer value: <input id='update_timer' type='num' class='numeric' value='60'></label>
            <label for='play_sound'><input type='checkbox' id='play_sound'> Sound</label>
            <div class="options-block">
                <a href='#' id='search_manager'>Manage search</a> &nbsp;
                <a href='set_cookie.php' target='_set_cookies'>Set cookies</a>
            </div>            

            <div id='search_manager_div'>
                <h4 class='block-control'>Search parameters</h4>
                <table>
                    <tr>
                        <td>
                            <label for='pickup_states_selector' class="clearfix">Pickup states</label><br>
                            <select id='pickup_states_selector' multiple="multiple" size="5" name="pickupAreas[]">
                                <option value="All" label="All" title="All">All</option>
                                <option value="region_1" label="Northeast - ME,VT,NH,MA,RI,CT,NY,NJ,PA,DE" title="Northeast - ME,VT,NH,MA,RI,CT,NY,NJ,PA,DE">Northeast - ME,VT,NH,MA,RI,CT,NY,NJ,PA,DE</option>
                                <option value="region_2" label="Southeast - MD,DC,VA,WV,KY,TN,NC,SC,AL,GA,FL" title="Southeast - MD,DC,VA,WV,KY,TN,NC,SC,AL,GA,FL">Southeast - MD,DC,VA,WV,KY,TN,NC,SC,AL,GA,FL</option>
                                <option value="region_3" label="Midwest/Plains - OH,IN,IL,MO,KS,WI,MI,MN,IA,NE,SD,ND" title="Midwest/Plains - OH,IN,IL,MO,KS,WI,MI,MN,IA,NE,SD,ND">Midwest/Plains - OH,IN,IL,MO,KS,WI,MI,MN,IA,NE,SD,ND</option>
                                <option value="region_4" label="South - TX,OK,AR,LA,MS" title="South - TX,OK,AR,LA,MS">South - TX,OK,AR,LA,MS</option>
                                <option value="region_5" label="Northwest - WA,OR,ID,MT,WY" title="Northwest - WA,OR,ID,MT,WY">Northwest - WA,OR,ID,MT,WY</option>
                                <option value="region_6" label="Southwest - CA,NV,UT,AZ,CO,NM" title="Southwest - CA,NV,UT,AZ,CO,NM">Southwest - CA,NV,UT,AZ,CO,NM</option>
                                <option value="region_7" label="Pacific - AK,HI" title="Pacific - AK,HI">Pacific - AK,HI</option>
                                <option value="state_USA_AL" label="Alabama" title="Alabama">Alabama</option>
                                <option value="state_USA_AK" label="Alaska" title="Alaska">Alaska</option>
                                <option value="state_USA_AZ" label="Arizona" title="Arizona">Arizona</option>
                                <option value="state_USA_AR" label="Arkansas" title="Arkansas">Arkansas</option>
                                <option value="state_USA_CA" label="California" title="California">California</option>
                                <option value="state_USA_CO" label="Colorado" title="Colorado">Colorado</option>
                                <option value="state_USA_CT" label="Connecticut" title="Connecticut">Connecticut</option>
                                <option value="state_USA_DE" label="Delaware" title="Delaware">Delaware</option>
                                <option value="state_USA_FL" label="Florida" title="Florida">Florida</option>
                                <option value="state_USA_GA" label="Georgia" title="Georgia">Georgia</option>
                                <option value="state_USA_HI" label="Hawaii" title="Hawaii">Hawaii</option>
                                <option value="state_USA_ID" label="Idaho" title="Idaho">Idaho</option>
                                <option value="state_USA_IL" label="Illinois" title="Illinois">Illinois</option>
                                <option value="state_USA_IN" label="Indiana" title="Indiana">Indiana</option>
                                <option value="state_USA_IA" label="Iowa" title="Iowa">Iowa</option>
                                <option value="state_USA_KS" label="Kansas" title="Kansas">Kansas</option>
                                <option value="state_USA_KY" label="Kentucky" title="Kentucky">Kentucky</option>
                                <option value="state_USA_LA" label="Louisiana" title="Louisiana">Louisiana</option>
                                <option value="state_USA_ME" label="Maine" title="Maine">Maine</option>
                                <option value="state_USA_MD" label="Maryland" title="Maryland">Maryland</option>
                                <option value="state_USA_MA" label="Massachusetts" title="Massachusetts">Massachusetts</option>
                                <option value="state_USA_MI" label="Michigan" title="Michigan">Michigan</option>
                                <option value="state_USA_MN" label="Minnesota" title="Minnesota">Minnesota</option>
                                <option value="state_USA_MS" label="Mississippi" title="Mississippi">Mississippi</option>
                                <option value="state_USA_MO" label="Missouri" title="Missouri">Missouri</option>
                                <option value="state_USA_MT" label="Montana" title="Montana">Montana</option>
                                <option value="state_USA_NE" label="Nebraska" title="Nebraska">Nebraska</option>
                                <option value="state_USA_NV" label="Nevada" title="Nevada">Nevada</option>
                                <option value="state_USA_NH" label="New Hampshire" title="New Hampshire">New Hampshire</option>
                                <option value="state_USA_NJ" label="New Jersey" title="New Jersey">New Jersey</option>
                                <option value="state_USA_NM" label="New Mexico" title="New Mexico">New Mexico</option>
                                <option value="state_USA_NY" label="New York" title="New York">New York</option>
                                <option value="state_USA_NC" label="North Carolina" title="North Carolina">North Carolina</option>
                                <option value="state_USA_ND" label="North Dakota" title="North Dakota">North Dakota</option>
                                <option value="state_USA_OH" label="Ohio" title="Ohio">Ohio</option>
                                <option value="state_USA_OK" label="Oklahoma" title="Oklahoma">Oklahoma</option>
                                <option value="state_USA_OR" label="Oregon" title="Oregon">Oregon</option>
                                <option value="state_USA_PA" label="Pennsylvania" title="Pennsylvania">Pennsylvania</option>
                                <option value="state_USA_RI" label="Rhode Island" title="Rhode Island">Rhode Island</option>
                                <option value="state_USA_SC" label="South Carolina" title="South Carolina">South Carolina</option>
                                <option value="state_USA_SD" label="South Dakota" title="South Dakota">South Dakota</option>
                                <option value="state_USA_TN" label="Tennessee" title="Tennessee">Tennessee</option>
                                <option value="state_USA_TX" label="Texas" title="Texas">Texas</option>
                                <option value="state_USA_UT" label="Utah" title="Utah">Utah</option>
                                <option value="state_USA_VT" label="Vermont" title="Vermont">Vermont</option>
                                <option value="state_USA_VA" label="Virginia" title="Virginia">Virginia</option>
                                <option value="state_USA_WA" label="Washington" title="Washington">Washington</option>
                                <option value="state_USA_DC" label="Washington DC" title="Washington DC">Washington DC</option>
                                <option value="state_USA_WV" label="West Virginia" title="West Virginia">West Virginia</option>
                                <option value="state_USA_WI" label="Wisconsin" title="Wisconsin">Wisconsin</option>
                                <option value="state_USA_WY" label="Wyoming" title="Wyoming">Wyoming</option>
                                <option value="country_CAN" label="Canada" title="Canada">Canada</option>
                                <option value="state_CAN_AB" label="Canada-Alberta" title="Canada-Alberta">Canada-Alberta</option>
                                <option value="state_CAN_BC" label="Canada-British Columbia" title="Canada-British Columbia">Canada-British Columbia</option>
                                <option value="state_CAN_MB" label="Canada-Manitoba" title="Canada-Manitoba">Canada-Manitoba</option>
                                <option value="state_CAN_NB" label="Canada-New Brunswick" title="Canada-New Brunswick">Canada-New Brunswick</option>
                                <option value="state_CAN_NL" label="Canada-Newfoundland" title="Canada-Newfoundland">Canada-Newfoundland</option>
                                <option value="state_CAN_NT" label="Canada-Northwest Territories" title="Canada-Northwest Territories">Canada-Northwest Territories</option>
                                <option value="state_CAN_NS" label="Canada-Nova Scotia" title="Canada-Nova Scotia">Canada-Nova Scotia</option>
                                <option value="state_CAN_NU" label="Canada-Nunavut" title="Canada-Nunavut">Canada-Nunavut</option>
                                <option value="state_CAN_ON" label="Canada-Ontario" title="Canada-Ontario">Canada-Ontario</option>
                                <option value="state_CAN_PE" label="Canada-Prince Edward Island" title="Canada-Prince Edward Island">Canada-Prince Edward Island</option>
                                <option value="state_CAN_QC" label="Canada-Quebec" title="Canada-Quebec">Canada-Quebec</option>
                                <option value="state_CAN_SK" label="Canada-Saskatchewan" title="Canada-Saskatchewan">Canada-Saskatchewan</option>
                                <option value="state_CAN_YT" label="Canada-Yukon" title="Canada-Yukon">Canada-Yukon</option>
                            </select>	
                        </td>
                        <td>
                            <label for='delivery_states_selector' class="clearfix">Delivery states</label><br>
                            <select id='delivery_states_selector' multiple="multiple" size="5" name="deliveryAreas[]">
                                <option value="All" label="All" title="All">All</option>
                                <option value="region_1" label="Northeast - ME,VT,NH,MA,RI,CT,NY,NJ,PA,DE" title="Northeast - ME,VT,NH,MA,RI,CT,NY,NJ,PA,DE">Northeast - ME,VT,NH,MA,RI,CT,NY,NJ,PA,DE</option>
                                <option value="region_2" label="Southeast - MD,DC,VA,WV,KY,TN,NC,SC,AL,GA,FL" title="Southeast - MD,DC,VA,WV,KY,TN,NC,SC,AL,GA,FL">Southeast - MD,DC,VA,WV,KY,TN,NC,SC,AL,GA,FL</option>
                                <option value="region_3" label="Midwest/Plains - OH,IN,IL,MO,KS,WI,MI,MN,IA,NE,SD,ND" title="Midwest/Plains - OH,IN,IL,MO,KS,WI,MI,MN,IA,NE,SD,ND">Midwest/Plains - OH,IN,IL,MO,KS,WI,MI,MN,IA,NE,SD,ND</option>
                                <option value="region_4" label="South - TX,OK,AR,LA,MS" title="South - TX,OK,AR,LA,MS">South - TX,OK,AR,LA,MS</option>
                                <option value="region_5" label="Northwest - WA,OR,ID,MT,WY" title="Northwest - WA,OR,ID,MT,WY">Northwest - WA,OR,ID,MT,WY</option>
                                <option value="region_6" label="Southwest - CA,NV,UT,AZ,CO,NM" title="Southwest - CA,NV,UT,AZ,CO,NM">Southwest - CA,NV,UT,AZ,CO,NM</option>
                                <option value="region_7" label="Pacific - AK,HI" title="Pacific - AK,HI">Pacific - AK,HI</option>
                                <option value="state_USA_AL" label="Alabama" title="Alabama">Alabama</option>
                                <option value="state_USA_AK" label="Alaska" title="Alaska">Alaska</option>
                                <option value="state_USA_AZ" label="Arizona" title="Arizona">Arizona</option>
                                <option value="state_USA_AR" label="Arkansas" title="Arkansas">Arkansas</option>
                                <option value="state_USA_CA" label="California" title="California">California</option>
                                <option value="state_USA_CO" label="Colorado" title="Colorado">Colorado</option>
                                <option value="state_USA_CT" label="Connecticut" title="Connecticut">Connecticut</option>
                                <option value="state_USA_DE" label="Delaware" title="Delaware">Delaware</option>
                                <option value="state_USA_FL" label="Florida" title="Florida">Florida</option>
                                <option value="state_USA_GA" label="Georgia" title="Georgia">Georgia</option>
                                <option value="state_USA_HI" label="Hawaii" title="Hawaii">Hawaii</option>
                                <option value="state_USA_ID" label="Idaho" title="Idaho">Idaho</option>
                                <option value="state_USA_IL" label="Illinois" title="Illinois">Illinois</option>
                                <option value="state_USA_IN" label="Indiana" title="Indiana">Indiana</option>
                                <option value="state_USA_IA" label="Iowa" title="Iowa">Iowa</option>
                                <option value="state_USA_KS" label="Kansas" title="Kansas">Kansas</option>
                                <option value="state_USA_KY" label="Kentucky" title="Kentucky">Kentucky</option>
                                <option value="state_USA_LA" label="Louisiana" title="Louisiana">Louisiana</option>
                                <option value="state_USA_ME" label="Maine" title="Maine">Maine</option>
                                <option value="state_USA_MD" label="Maryland" title="Maryland">Maryland</option>
                                <option value="state_USA_MA" label="Massachusetts" title="Massachusetts">Massachusetts</option>
                                <option value="state_USA_MI" label="Michigan" title="Michigan">Michigan</option>
                                <option value="state_USA_MN" label="Minnesota" title="Minnesota">Minnesota</option>
                                <option value="state_USA_MS" label="Mississippi" title="Mississippi">Mississippi</option>
                                <option value="state_USA_MO" label="Missouri" title="Missouri">Missouri</option>
                                <option value="state_USA_MT" label="Montana" title="Montana">Montana</option>
                                <option value="state_USA_NE" label="Nebraska" title="Nebraska">Nebraska</option>
                                <option value="state_USA_NV" label="Nevada" title="Nevada">Nevada</option>
                                <option value="state_USA_NH" label="New Hampshire" title="New Hampshire">New Hampshire</option>
                                <option value="state_USA_NJ" label="New Jersey" title="New Jersey">New Jersey</option>
                                <option value="state_USA_NM" label="New Mexico" title="New Mexico">New Mexico</option>
                                <option value="state_USA_NY" label="New York" title="New York">New York</option>
                                <option value="state_USA_NC" label="North Carolina" title="North Carolina">North Carolina</option>
                                <option value="state_USA_ND" label="North Dakota" title="North Dakota">North Dakota</option>
                                <option value="state_USA_OH" label="Ohio" title="Ohio">Ohio</option>
                                <option value="state_USA_OK" label="Oklahoma" title="Oklahoma">Oklahoma</option>
                                <option value="state_USA_OR" label="Oregon" title="Oregon">Oregon</option>
                                <option value="state_USA_PA" label="Pennsylvania" title="Pennsylvania">Pennsylvania</option>
                                <option value="state_USA_RI" label="Rhode Island" title="Rhode Island">Rhode Island</option>
                                <option value="state_USA_SC" label="South Carolina" title="South Carolina">South Carolina</option>
                                <option value="state_USA_SD" label="South Dakota" title="South Dakota">South Dakota</option>
                                <option value="state_USA_TN" label="Tennessee" title="Tennessee">Tennessee</option>
                                <option value="state_USA_TX" label="Texas" title="Texas">Texas</option>
                                <option value="state_USA_UT" label="Utah" title="Utah">Utah</option>
                                <option value="state_USA_VT" label="Vermont" title="Vermont">Vermont</option>
                                <option value="state_USA_VA" label="Virginia" title="Virginia">Virginia</option>
                                <option value="state_USA_WA" label="Washington" title="Washington">Washington</option>
                                <option value="state_USA_DC" label="Washington DC" title="Washington DC">Washington DC</option>
                                <option value="state_USA_WV" label="West Virginia" title="West Virginia">West Virginia</option>
                                <option value="state_USA_WI" label="Wisconsin" title="Wisconsin">Wisconsin</option>
                                <option value="state_USA_WY" label="Wyoming" title="Wyoming">Wyoming</option>
                                <option value="country_CAN" label="Canada" title="Canada">Canada</option>
                                <option value="state_CAN_AB" label="Canada-Alberta" title="Canada-Alberta">Canada-Alberta</option>
                                <option value="state_CAN_BC" label="Canada-British Columbia" title="Canada-British Columbia">Canada-British Columbia</option>
                                <option value="state_CAN_MB" label="Canada-Manitoba" title="Canada-Manitoba">Canada-Manitoba</option>
                                <option value="state_CAN_NB" label="Canada-New Brunswick" title="Canada-New Brunswick">Canada-New Brunswick</option>
                                <option value="state_CAN_NL" label="Canada-Newfoundland" title="Canada-Newfoundland">Canada-Newfoundland</option>
                                <option value="state_CAN_NT" label="Canada-Northwest Territories" title="Canada-Northwest Territories">Canada-Northwest Territories</option>
                                <option value="state_CAN_NS" label="Canada-Nova Scotia" title="Canada-Nova Scotia">Canada-Nova Scotia</option>
                                <option value="state_CAN_NU" label="Canada-Nunavut" title="Canada-Nunavut">Canada-Nunavut</option>
                                <option value="state_CAN_ON" label="Canada-Ontario" title="Canada-Ontario">Canada-Ontario</option>
                                <option value="state_CAN_PE" label="Canada-Prince Edward Island" title="Canada-Prince Edward Island">Canada-Prince Edward Island</option>
                                <option value="state_CAN_QC" label="Canada-Quebec" title="Canada-Quebec">Canada-Quebec</option>
                                <option value="state_CAN_SK" label="Canada-Saskatchewan" title="Canada-Saskatchewan">Canada-Saskatchewan</option>
                                <option value="state_CAN_YT" label="Canada-Yukon" title="Canada-Yukon">Canada-Yukon</option>
                            </select>	
                        </td>
                        <td>
                            <label for='car_types_selector' class='clearfix'>Car types</label><br>
                            <select id='car_types_selector' multiple="multiple" size="5" name="vehicleTypeIds[]">
                                <option value="14" label="ATV" title="ATV">ATV</option>
                                <option value="3" label="Boat" title="Boat">Boat</option>
                                <option value="4" label="Car" title="Car">Car</option>
                                <option value="13" label="Heavy Equipment" title="Heavy Equipment">Heavy Equipment</option>
                                <option value="15" label="Large Yacht" title="Large Yacht">Large Yacht</option>
                                <option value="5" label="Motorcycle" title="Motorcycle">Motorcycle</option>
                                <option value="6" label="Pickup" title="Pickup">Pickup</option>
                                <option value="7" label="RV" title="RV">RV</option>
                                <option value="8" label="SUV" title="SUV">SUV</option>
                                <option value="9" label="Travel Trailer" title="Travel Trailer">Travel Trailer</option>
                                <option value="10" label="Van" title="Van">Van</option>
                                <option value="1" label="Other" title="Other">Other</option>
                            </select>
                        </td>
                    <tr>
                </table>
                <button id='apply_search'>Apply search parameters</button>
            </div>
        </div>
        <table id='rows' class='listingTable'>
            <tr></tr>
        </table>
        <script type="text/javascript" src="/js/script.js"></script>
    </body>
</html>

