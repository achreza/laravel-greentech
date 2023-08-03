@extends('layouts.layout')

@section('content')
    <div class="container ">
        <div class="row">
            <h1 class="font-weight-bold">Register Account</h1>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="card" style="width: 100%;height: max-content; padding:15px;">
                    <form action="/auth/register" method="post" name="register_form">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $email }}"
                                readonly />
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="fullname" />
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" />
                        </div>
                        <div class="form-group">
                            <label>Institution</label>
                            <input type="text" class="form-control" name="institution" />
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" class="form-control" id="">
                               <option data-countryCode="GB" value="United Kingdom" Selected>UK (+44)</option>
<option data-countryCode="US" value="United States">USA (+1)</option>
<optgroup label="Other countries">
    <option data-countryCode="DZ" value="Algeria">Algeria (+213)</option>
    <option data-countryCode="AD" value="Andorra">Andorra (+376)</option>
    <option data-countryCode="AO" value="Angola">Angola (+244)</option>
    <option data-countryCode="AI" value="Anguilla">Anguilla (+1264)</option>
    <option data-countryCode="AG" value="Antigua &amp; Barbuda">Antigua &amp; Barbuda (+1268)</option>
    <option data-countryCode="AR" value="Argentina">Argentina (+54)</option>
    <option data-countryCode="AM" value="Armenia">Armenia (+374)</option>
    <option data-countryCode="AW" value="Aruba">Aruba (+297)</option>
    <option data-countryCode="AU" value="Australia">Australia (+61)</option>
    <option data-countryCode="AT" value="Austria">Austria (+43)</option>
    <option data-countryCode="AZ" value="Azerbaijan">Azerbaijan (+994)</option>
    <option data-countryCode="BS" value="Bahamas">Bahamas (+1242)</option>
    <option data-countryCode="BH" value="Bahrain">Bahrain (+973)</option>
    <option data-countryCode="BD" value="Bangladesh">Bangladesh (+880)</option>
    <option data-countryCode="BB" value="Barbados">Barbados (+1246)</option>
    <option data-countryCode="BY" value="Belarus">Belarus (+375)</option>
    <option data-countryCode="BE" value="Belgium">Belgium (+32)</option>
    <option data-countryCode="BZ" value="Belize">Belize (+501)</option>
    <option data-countryCode="BJ" value="Benin">Benin (+229)</option>
    <option data-countryCode="BM" value="Bermuda">Bermuda (+1441)</option>
    <option data-countryCode="BT" value="Bhutan">Bhutan (+975)</option>
    <option data-countryCode="BO" value="Bolivia">Bolivia (+591)</option>
    <option data-countryCode="BA" value="Bosnia Herzegovina">Bosnia Herzegovina (+387)</option>
    <option data-countryCode="BW" value="Botswana">Botswana (+267)</option>
    <option data-countryCode="BR" value="Brazil">Brazil (+55)</option>
    <option data-countryCode="BN" value="Brunei">Brunei (+673)</option>
    <option data-countryCode="BG" value="Bulgaria">Bulgaria (+359)</option>
    <option data-countryCode="BF" value="Burkina Faso">Burkina Faso (+226)</option>
    <option data-countryCode="BI" value="Burundi">Burundi (+257)</option>
    <option data-countryCode="KH" value="Cambodia">Cambodia (+855)</option>
    <option data-countryCode="CM" value="Cameroon">Cameroon (+237)</option>
    <option data-countryCode="CA" value="Canada">Canada (+1)</option>
    <option data-countryCode="CV" value="Cape Verde Islands">Cape Verde Islands (+238)</option>
    <option data-countryCode="KY" value="Cayman Islands">Cayman Islands (+1345)</option>
    <option data-countryCode="CF" value="Central African Republic">Central African Republic (+236)</option>
    <option data-countryCode="CL" value="Chile">Chile (+56)</option>
    <option data-countryCode="CN" value="China">China (+86)</option>
    <option data-countryCode="CO" value="Colombia">Colombia (+57)</option>
    <option data-countryCode="KM" value="Comoros">Comoros (+269)</option>
    <option data-countryCode="CG" value="Congo">Congo (+242)</option>
    <option data-countryCode="CK" value="Cook Islands">Cook Islands (+682)</option>
    <option data-countryCode="CR" value="Costa Rica">Costa Rica (+506)</option>
    <option data-countryCode="HR" value="Croatia">Croatia (+385)</option>
    <option data-countryCode="CU" value="Cuba">Cuba (+53)</option>
    <option data-countryCode="CY" value="Cyprus North">Cyprus North (+90392)</option>
    <option data-countryCode="CY" value="Cyprus South">Cyprus South (+357)</option>
    <option data-countryCode="CZ" value="Czech Republic">Czech Republic (+42)</option>
    <option data-countryCode="DK" value="Denmark">Denmark (+45)</option>
    <option data-countryCode="DJ" value="Djibouti">Djibouti (+253)</option>
    <option data-countryCode="DM" value="Dominica">Dominica (+1809)</option>
    <option data-countryCode="DO" value="Dominican Republic">Dominican Republic (+1809)</option>
    <option data-countryCode="EC" value="Ecuador">Ecuador (+593)</option>
    <option data-countryCode="EG" value="Egypt">Egypt (+20)</option>
    <option data-countryCode="SV" value="El Salvador">El Salvador (+503)</option>
    <option data-countryCode="GQ" value="Equatorial Guinea">Equatorial Guinea (+240)</option>
    <option data-countryCode="ER" value="Eritrea">Eritrea (+291)</option>
    <option data-countryCode="EE" value="Estonia">Estonia (+372)</option>
    <option data-countryCode="ET" value="Ethiopia">Ethiopia (+251)</option>
    <option data-countryCode="FK" value="Falkland Islands">Falkland Islands (+500)</option>
    <option data-countryCode="FO" value="Faroe Islands">Faroe Islands (+298)</option>
    <option data-countryCode="FJ" value="Fiji">Fiji (+679)</option>
    <option data-countryCode="FI" value="Finland">Finland (+358)</option>
    <option data-countryCode="FR" value="France">France (+33)</option>
    <option data-countryCode="GF" value="French Guiana">French Guiana (+594)</option>
    <option data-countryCode="PF" value="French Polynesia">French Polynesia (+689)</option>
    <option data-countryCode="GA" value="Gabon">Gabon (+241)</option>
    <option data-countryCode="GM" value="Gambia">Gambia (+220)</option>
    <option data-countryCode="GE" value="Georgia">Georgia (+7880)</option>
    <option data-countryCode="DE" value="Germany">Germany (+49)</option>
    <option data-countryCode="GH" value="Ghana">Ghana (+233)</option>
    <option data-countryCode="GI" value="Gibraltar">Gibraltar (+350)</option>
    <option data-countryCode="GR" value="Greece">Greece (+30)</option>
    <option data-countryCode="GL" value="Greenland">Greenland (+299)</option>
    <option data-countryCode="GD" value="Grenada">Grenada (+1473)</option>
    <option data-countryCode="GP" value="Guadeloupe">Guadeloupe (+590)</option>
    <option data-countryCode="GU" value="Guam">Guam (+671)</option>
    <option data-countryCode="GT" value="Guatemala">Guatemala (+502)</option>
    <option data-countryCode="GN" value="Guinea">Guinea (+224)</option>
    <option data-countryCode="GW" value="Guinea - Bissau">Guinea - Bissau (+245)</option>
    <option data-countryCode="GY" value="Guyana">Guyana (+592)</option>
    <option data-countryCode="HT" value="Haiti">Haiti (+509)</option>
    <option data-countryCode="HN" value="Honduras">Honduras (+504)</option>
    <option data-countryCode="HK" value="Hong Kong">Hong Kong (+852)</option>
    <option data-countryCode="HU" value="Hungary">Hungary (+36)</option>
    <option data-countryCode="IS" value="Iceland">Iceland (+354)</option>
    <option data-countryCode="IN" value="India">India (+91)</option>
    <option data-countryCode="ID" value="Indonesia">Indonesia (+62)</option>
    <option data-countryCode="IR" value="Iran">Iran (+98)</option>
    <option data-countryCode="IQ" value="Iraq">Iraq (+964)</option>
    <option data-countryCode="IE" value="Ireland">Ireland (+353)</option>
    <option data-countryCode="IL" value="Israel">Israel (+972)</option>
    <option data-countryCode="IT" value="Italy">Italy (+39)</option>
    <option data-countryCode="JM" value="Jamaica">Jamaica (+1876)</option>
    <option data-countryCode="JP" value="Japan">Japan (+81)</option>
    <option data-countryCode="JO" value="Jordan">Jordan (+962)</option>
    <option data-countryCode="KZ" value="Kazakhstan">Kazakhstan (+7)</option>
    <option data-countryCode="KE" value="Kenya">Kenya (+254)</option>
    <option data-countryCode="KI" value="Kiribati">Kiribati (+686)</option>
    <option data-countryCode="KP" value="Korea North">Korea North (+850)</option>
    <option data-countryCode="KR" value="Korea South">Korea South (+82)</option>
    <option data-countryCode="KW" value="Kuwait">Kuwait (+965)</option>
    <option data-countryCode="KG" value="Kyrgyzstan">Kyrgyzstan (+996)</option>
    <option data-countryCode="LA" value="Laos">Laos (+856)</option>
    <option data-countryCode="LV" value="Latvia">Latvia (+371)</option>
    <option data-countryCode="LB" value="Lebanon">Lebanon (+961)</option>
    <option data-countryCode="LS" value="Lesotho">Lesotho (+266)</option>
    <option data-countryCode="LR" value="Liberia">Liberia (+231)</option>
    <option data-countryCode="LY" value="Libya">Libya (+218)</option>
    <option data-countryCode="LI" value="Liechtenstein">Liechtenstein (+417)</option>
    <option data-countryCode="LT" value="Lithuania">Lithuania (+370)</option>
    <option data-countryCode="LU" value="Luxembourg">Luxembourg (+352)</option>
    <option data-countryCode="MO" value="Macao">Macao (+853)</option>
    <option data-countryCode="MK" value="Macedonia">Macedonia (+389)</option>
    <option data-countryCode="MG" value="Madagascar">Madagascar (+261)</option>
    <option data-countryCode="MW" value="Malawi">Malawi (+265)</option>
    <option data-countryCode="MY" value="Malaysia">Malaysia (+60)</option>
    <option data-countryCode="MV" value="Maldives">Maldives (+960)</option>
    <option data-countryCode="ML" value="Mali">Mali (+223)</option>
    <option data-countryCode="MT" value="Malta">Malta (+356)</option>
    <option data-countryCode="MH" value="Marshall Islands">Marshall Islands (+692)</option>
    <option data-countryCode="MQ" value="Martinique">Martinique (+596)</option>
    <option data-countryCode="MR" value="Mauritania">Mauritania (+222)</option>
    <option data-countryCode="YT" value="Mayotte">Mayotte (+269)</option>
    <option data-countryCode="MX" value="Mexico">Mexico (+52)</option>
    <option data-countryCode="FM" value="Micronesia">Micronesia (+691)</option>
    <option data-countryCode="MD" value="Moldova">Moldova (+373)</option>
    <option data-countryCode="MC" value="Monaco">Monaco (+377)</option>
    <option data-countryCode="MN" value="Mongolia">Mongolia (+976)</option>
    <option data-countryCode="MS" value="Montserrat">Montserrat (+1664)</option>
    <option data-countryCode="MA" value="Morocco">Morocco (+212)</option>
    <option data-countryCode="MZ" value="Mozambique">Mozambique (+258)</option>
    <option data-countryCode="MN" value="Myanmar">Myanmar (+95)</option>
    <option data-countryCode="NA" value="Namibia">Namibia (+264)</option>
    <option data-countryCode="NR" value="Nauru">Nauru (+674)</option>
    <option data-countryCode="NP" value="Nepal">Nepal (+977)</option>
    <option data-countryCode="NL" value="Netherlands">Netherlands (+31)</option>
    <option data-countryCode="NC" value="New Caledonia">New Caledonia (+687)</option>
    <option data-countryCode="NZ" value="New Zealand">New Zealand (+64)</option>
    <option data-countryCode="NI" value="Nicaragua">Nicaragua (+505)</option>
    <option data-countryCode="NE" value="Niger">Niger (+227)</option>
    <option data-countryCode="NG" value="Nigeria">Nigeria (+234)</option>
    <option data-countryCode="NU" value="Niue">Niue (+683)</option>
    <option data-countryCode="NF" value="Norfolk Islands">Norfolk Islands (+672)</option>
    <option data-countryCode="NP" value="Northern Marianas">Northern Marianas (+670)</option>
    <option data-countryCode="NO" value="Norway">Norway (+47)</option>
    <option data-countryCode="OM" value="Oman">Oman (+968)</option>
    <option data-countryCode="PW" value="Palau">Palau (+680)</option>
    <option data-countryCode="PA" value="Panama">Panama (+507)</option>
    <option data-countryCode="PG" value="Papua New Guinea">Papua New Guinea (+675)</option>
    <option data-countryCode="PY" value="Paraguay">Paraguay (+595)</option>
    <option data-countryCode="PE" value="Peru">Peru (+51)</option>
    <option data-countryCode="PH" value="Philippines">Philippines (+63)</option>
    <option data-countryCode="PL" value="Poland">Poland (+48)</option>
    <option data-countryCode="PT" value="Portugal">Portugal (+351)</option>
    <option data-countryCode="PR" value="Puerto Rico">Puerto Rico (+1787)</option>
    <option data-countryCode="QA" value="Qatar">Qatar (+974)</option>
    <option data-countryCode="RE" value="Reunion">Reunion (+262)</option>
    <option data-countryCode="RO" value="Romania">Romania (+40)</option>
    <option data-countryCode="RU" value="Russia">Russia (+7)</option>
    <option data-countryCode="RW" value="Rwanda">Rwanda (+250)</option>
    <option data-countryCode="SM" value="San Marino">San Marino (+378)</option>
    <option data-countryCode="ST" value="Sao Tome &amp; Principe">Sao Tome &amp; Principe (+239)</option>
    <option data-countryCode="SA" value="Saudi Arabia">Saudi Arabia (+966)</option>
    <option data-countryCode="SN" value="Senegal">Senegal (+221)</option>
    <option data-countryCode="CS" value="Serbia">Serbia (+381)</option>
    <option data-countryCode="SC" value="Seychelles">Seychelles (+248)</option>
    <option data-countryCode="SL" value="Sierra Leone">Sierra Leone (+232)</option>
    <option data-countryCode="SG" value="Singapore">Singapore (+65)</option>
    <option data-countryCode="SK" value="Slovak Republic">Slovak Republic (+421)</option>
    <option data-countryCode="SI" value="Slovenia">Slovenia (+386)</option>
    <option data-countryCode="SB" value="Solomon Islands">Solomon Islands (+677)</option>
    <option data-countryCode="SO" value="Somalia">Somalia (+252)</option>
    <option data-countryCode="ZA" value="South Africa">South Africa (+27)</option>
    <option data-countryCode="ES" value="Spain">Spain (+34)</option>
    <option data-countryCode="LK" value="Sri Lanka">Sri Lanka (+94)</option>
    <option data-countryCode="SH" value="St. Helena">St. Helena (+290)</option>
    <option data-countryCode="KN" value="St. Kitts">St. Kitts (+1869)</option>
    <option data-countryCode="SC" value="St. Lucia">St. Lucia (+1758)</option>
    <option data-countryCode="SD" value="Sudan">Sudan (+249)</option>
    <option data-countryCode="SR" value="Suriname">Suriname (+597)</option>
    <option data-countryCode="SZ" value="Swaziland">Swaziland (+268)</option>
    <option data-countryCode="SE" value="Sweden">Sweden (+46)</option>
    <option data-countryCode="CH" value="Switzerland">Switzerland (+41)</option>
    <option data-countryCode="SI" value="Syria">Syria (+963)</option>
    <option data-countryCode="TW" value="Taiwan">Taiwan (+886)</option>
    <option data-countryCode="TJ" value="Tajikstan">Tajikstan (+7)</option>
    <option data-countryCode="TH" value="Thailand">Thailand (+66)</option>
    <option data-countryCode="TG" value="Togo">Togo (+228)</option>
    <option data-countryCode="TO" value="Tonga">Tonga (+676)</option>
    <option data-countryCode="TT" value="Trinidad &amp; Tobago">Trinidad &amp; Tobago (+1868)</option>
    <option data-countryCode="TN" value="Tunisia">Tunisia (+216)</option>
    <option data-countryCode="TR" value="Turkey">Turkey (+90)</option>
    <option data-countryCode="TM" value="Turkmenistan">Turkmenistan (+7)</option>
    <option data-countryCode="TM" value="Turkmenistan">Turkmenistan (+993)</option>
    <option data-countryCode="TC" value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands (+1649)</option>
    <option data-countryCode="TV" value="Tuvalu">Tuvalu (+688)</option>
    <option data-countryCode="UG" value="Uganda">Uganda (+256)</option>
    <!-- <option data-countryCode="GB" value="United Kingdom">UK (+44)</option> -->
    <option data-countryCode="UA" value="Ukraine">Ukraine (+380)</option>
    <option data-countryCode="AE" value="United Arab Emirates">United Arab Emirates (+971)</option>
    <option data-countryCode="UY" value="Uruguay">Uruguay (+598)</option>
    <!-- <option data-countryCode="US" value="USA">USA (+1)</option> -->
    <option data-countryCode="UZ" value="Uzbekistan">Uzbekistan (+7)</option>
    <option data-countryCode="VU" value="Vanuatu">Vanuatu (+678)</option>
    <option data-countryCode="VA" value="Vatican City">Vatican City (+379)</option>
    <option data-countryCode="VE" value="Venezuela">Venezuela (+58)</option>
    <option data-countryCode="VN" value="Vietnam">Vietnam (+84)</option>
    <option data-countryCode="VG" value="Virgin Islands - British">Virgin Islands - British (+1284)</option>
    <option data-countryCode="VI" value="Virgin Islands - US">Virgin Islands - US (+1340)</option>
    <option data-countryCode="WF" value="Wallis &amp; Futuna">Wallis &amp; Futuna (+681)</option>
    <option data-countryCode="YE" value="Yemen">Yemen (+969)</option>
    <option data-countryCode="YE" value="Yemen">Yemen (+967)</option>
    <option data-countryCode="ZM" value="Zambia">Zambia (+260)</option>
    <option data-countryCode="ZW" value="Zimbabwe">Zimbabwe (+263)</option>
</optgroup>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male">
                                    Male
                                </option>
                                <option value="female">
                                    Female
                                </option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="2">Presenter</option>
                                <option value="3">Participant</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" value="Register">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="d-flex justify-content-center">
            <p class="mb-0 text-muted">©
                <script>
                    document.write(new Date().getFullYear())
                </script> Created by <i class="mdi mdi-heart text-danger"></i> by Ekata Tech
            </p>
        </footer>
    </div>
@endsection
