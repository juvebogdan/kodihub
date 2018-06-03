<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Copyright complaints form</title>
<link href="<?php echo base_url(); ?>css/style2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
}
body {
	background-color: #6CC;
}
</style>
</head>

<body>
<div class="full">
  <div class="header">
    <div align="center">Copyright complaint form</div>
  </div>
  <?php echo form_open_multipart('', 'id="form1" method="post"'); ?>
  <div class="contentboxcomp">
    <p>Build to be removed</p>
    <p>Build title: 
      <input type="text" name="title" id="title" />
    </p>
    <p>Describe the work alledgly infringed: 
      <input type="text" name="work" id="work" />
    </p>
    <p>Upload an image of the alledged infringement:
      <input type="file" name="fileField1" id="imgInp1" value="Browse" />
    </p>
  </div>
  <div class="contentboxcomp">
    <div><span class="stats" id="non_dmca_msg">To submit a copyright infringement notification, please complete the following required fields.</span></div>
    <p class="stats">Tell us about yourself</p>
    <div id="contact-info-div2">
      <div id="personal-contact-info">
        <div><span class="stats">* <span data-field-name="owner_display_name">Copyright Owner's Name (Company Name):</span></span>
          <div class="tiny">The copyright owner name will be published on the KodiHub in place of disabled content. This will become part of the public record of your request, along with your description(s) of the work(s) allegedly infringed. All other information, including your full legal name and email address, are part of the full takedown notice, which may be provided to the uploader.</div>
          <input type="text" id="owner_display_name" name="owner_display_name" maxlength="64" />
        </div>
        <div class="stats">
          <p>
            <label for="requester_title2">*<span data-field-name="requester_title"> Your Title or Job Position (What is your authority to make this complaint?):</span></label>
            <input type="text" id="requester_title2" name="requester_title" maxlength="100" />
          </p>
        </div>
        <div class="stats"></div>
        <div class="stats">
          <label for="email"><span data-field-name="secondary_email">Email Address:</span></label>
          <input type="text" id="email" name="email" maxlength="128" />
        </div>
        <label for="email" class="tiny">We may email you about your takedown request if additional information is required..</label>
      </div>
    </div>
  </div>
  <div class="contentboxcomp">
    <div class="stats">
      <label for="requester_name">* <span data-field-name="requester_name">Your Full Legal Name (A first and a last name, not a company name):</span></label>
      <br />
      <input type="text" id="requester_name" name="requester_name" maxlength="100" />
    </div>
    <div class="stats">
      <label for="address1">* <span data-field-name="address1">Street Address:</span></label>
      <br />
      <input type="text" id="address1" name="address1" maxlength="200" />
      <label for="address2"><span data-field-name="address2"> <br />
      </span></label>
      <input type="text" id="address2" name="address2" maxlength="200" />
    </div>
    <div class="stats">
      <label for="city">* <span data-field-name="city">City:</span></label>
      <br />
      <input type="text" id="city" name="city" maxlength="100" />
    </div>
    <div class="stats">
      <label for="state">* <span data-field-name="state">County/Area</span></label>
      <br />
      <input type="text" id="state" name="state" maxlength="64" />
    </div>
    <span class="stats">  </span>
    <div> <span class="stats">
      <label for="zip">* <span data-field-name="zip">ZIP/Postcode:</span></label>
      <br />
      <input type="text" id="zip" name="zip" maxlength="40" value="" />
    </span></div>
    <div id="id_country_select_field"> <span class="stats">
      <label for="country">* Country:</label>
      <br />
      <select id="country" name="country" data-mark-required="id_country_select_field">
        
                   
          
        <option value="" selected="selected">           Please select one:         </option>
        
                   
          
        <option value="AF">Afghanistan</option>
        
                   
          
        <option value="AX">Aland Islands</option>
        
                   
          
        <option value="AL">Albania</option>
        
                   
          
        <option value="DZ">Algeria</option>
        
                   
          
        <option value="AS">American Samoa</option>
        
                   
          
        <option value="AD">Andorra</option>
        
                   
          
        <option value="AO">Angola</option>
        
                   
          
        <option value="AI">Anguilla</option>
        
                   
          
        <option value="AQ">Antarctica</option>
        
                   
          
        <option value="AG">Antigua and Barbuda</option>
        
                   
          
        <option value="AR">Argentina</option>
        
                   
          
        <option value="AM">Armenia</option>
        
                   
          
        <option value="AW">Aruba</option>
        
                   
          
        <option value="AU">Australia</option>
        
                   
          
        <option value="AT">Austria</option>
        
                   
          
        <option value="AZ">Azerbaijan</option>
        
                   
          
        <option value="BS">Bahamas</option>
        
                   
          
        <option value="BH">Bahrain</option>
        
                   
          
        <option value="BD">Bangladesh</option>
        
                   
          
        <option value="BB">Barbados</option>
        
                   
          
        <option value="BY">Belarus</option>
        
                   
          
        <option value="BE">Belgium</option>
        
                   
          
        <option value="BZ">Belize</option>
        
                   
          
        <option value="BJ">Benin</option>
        
                   
          
        <option value="BM">Bermuda</option>
        
                   
          
        <option value="BT">Bhutan</option>
        
                   
          
        <option value="BO">Bolivia</option>
        
                   
          
        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
        
                   
          
        <option value="BA">Bosnia and Herzegovina</option>
        
                   
          
        <option value="BW">Botswana</option>
        
                   
          
        <option value="BV">Bouvet Island</option>
        
                   
          
        <option value="BR">Brazil</option>
        
                   
          
        <option value="IO">British Indian Ocean Territory</option>
        
                   
          
        <option value="VG">British Virgin Islands</option>
        
                   
          
        <option value="BN">Brunei</option>
        
                   
          
        <option value="BG">Bulgaria</option>
        
                   
          
        <option value="BF">Burkina Faso</option>
        
                   
          
        <option value="BI">Burundi</option>
        
                   
          
        <option value="KH">Cambodia</option>
        
                   
          
        <option value="CM">Cameroon</option>
        
                   
          
        <option value="CA">Canada</option>
        
                   
          
        <option value="CV">Cape Verde</option>
        
                   
          
        <option value="KY">Cayman Islands</option>
        
                   
          
        <option value="CF">Central African Republic</option>
        
                   
          
        <option value="TD">Chad</option>
        
                   
          
        <option value="CL">Chile</option>
        
                   
          
        <option value="CN">China</option>
        
                   
          
        <option value="CX">Christmas Island</option>
        
                   
          
        <option value="CC">Cocos (Keeling) Islands</option>
        
                   
          
        <option value="CO">Colombia</option>
        
                   
          
        <option value="KM">Comoros</option>
        
                   
          
        <option value="CG">Congo</option>
        
                   
          
        <option value="CD">Congo - Democratic Republic of</option>
        
                   
          
        <option value="CK">Cook Islands</option>
        
                   
          
        <option value="CR">Costa Rica</option>
        
                   
          
        <option value="CI">Cote d'Ivoire</option>
        
                   
          
        <option value="HR">Croatia</option>
        
                   
          
        <option value="CU">Cuba</option>
        
                   
          
        <option value="CW">Curacao</option>
        
                   
          
        <option value="CY">Cyprus</option>
        
                   
          
        <option value="CZ">Czechia</option>
        
                   
          
        <option value="DK">Denmark</option>
        
                   
          
        <option value="DJ">Djibouti</option>
        
                   
          
        <option value="DM">Dominica</option>
        
                   
          
        <option value="DO">Dominican Republic</option>
        
                   
          
        <option value="TL">East Timor</option>
        
                   
          
        <option value="EC">Ecuador</option>
        
                   
          
        <option value="EG">Egypt</option>
        
                   
          
        <option value="SV">El Salvador</option>
        
                   
          
        <option value="GQ">Equatorial Guinea</option>
        
                   
          
        <option value="ER">Eritrea</option>
        
                   
          
        <option value="EE">Estonia</option>
        
                   
          
        <option value="ET">Ethiopia</option>
        
                   
          
        <option value="FK">Falkland Islands (Islas Malvinas)</option>
        
                   
          
        <option value="FO">Faroe Islands</option>
        
                   
          
        <option value="FJ">Fiji</option>
        
                   
          
        <option value="FI">Finland</option>
        
                   
          
        <option value="FR">France</option>
        
                   
          
        <option value="GF">French Guyana</option>
        
                   
          
        <option value="PF">French Polynesia</option>
        
                   
          
        <option value="TF">French Southern Territories</option>
        
                   
          
        <option value="GA">Gabon</option>
        
                   
          
        <option value="GM">Gambia</option>
        
                   
          
        <option value="GE">Georgia</option>
        
                   
          
        <option value="DE">Germany</option>
        
                   
          
        <option value="GH">Ghana</option>
        
                   
          
        <option value="GI">Gibraltar</option>
        
                   
          
        <option value="GR">Greece</option>
        
                   
          
        <option value="GL">Greenland</option>
        
                   
          
        <option value="GD">Grenada</option>
        
                   
          
        <option value="GP">Guadeloupe</option>
        
                   
          
        <option value="GU">Guam</option>
        
                   
          
        <option value="GT">Guatemala</option>
        
                   
          
        <option value="GG">Guernsey</option>
        
                   
          
        <option value="GN">Guinea</option>
        
                   
          
        <option value="GW">Guinea-Bissau</option>
        
                   
          
        <option value="GY">Guyana</option>
        
                   
          
        <option value="HT">Haiti</option>
        
                   
          
        <option value="HM">Heard Island and McDonald Islands</option>
        
                   
          
        <option value="VA">Holy See (Vatican City State)</option>
        
                   
          
        <option value="HN">Honduras</option>
        
                   
          
        <option value="HK">Hong Kong</option>
        
                   
          
        <option value="HU">Hungary</option>
        
                   
          
        <option value="IS">Iceland</option>
        
                   
          
        <option value="IN">India</option>
        
                   
          
        <option value="ID">Indonesia</option>
        
                   
          
        <option value="IR">Iran</option>
        
                   
          
        <option value="IQ">Iraq</option>
        
                   
          
        <option value="IE">Ireland</option>
        
                   
          
        <option value="IM">Isle of Man</option>
        
                   
          
        <option value="IL">Israel</option>
        
                   
          
        <option value="IT">Italy</option>
        
                   
          
        <option value="JM">Jamaica</option>
        
                   
          
        <option value="JP">Japan</option>
        
                   
          
        <option value="JE">Jersey</option>
        
                   
          
        <option value="JO">Jordan</option>
        
                   
          
        <option value="KZ">Kazakhstan</option>
        
                   
          
        <option value="KE">Kenya</option>
        
                   
          
        <option value="KI">Kiribati</option>
        
                   
          
        <option value="KW">Kuwait</option>
        
                   
          
        <option value="KG">Kyrgyzstan</option>
        
                   
          
        <option value="LA">Laos</option>
        
                   
          
        <option value="LV">Latvia</option>
        
                   
          
        <option value="LB">Lebanon</option>
        
                   
          
        <option value="LS">Lesotho</option>
        
                   
          
        <option value="LR">Liberia</option>
        
                   
          
        <option value="LY">Libya</option>
        
                   
          
        <option value="LI">Liechtenstein</option>
        
                   
          
        <option value="LT">Lithuania</option>
        
                   
          
        <option value="LU">Luxembourg</option>
        
                   
          
        <option value="MO">Macao</option>
        
                   
          
        <option value="MK">Macedonia</option>
        
                   
          
        <option value="MG">Madagascar</option>
        
                   
          
        <option value="MW">Malawi</option>
        
                   
          
        <option value="MY">Malaysia</option>
        
                   
          
        <option value="MV">Maldives</option>
        
                   
          
        <option value="ML">Mali</option>
        
                   
          
        <option value="MT">Malta</option>
        
                   
          
        <option value="MH">Marshall Islands</option>
        
                   
          
        <option value="MQ">Martinique</option>
        
                   
          
        <option value="MR">Mauritania</option>
        
                   
          
        <option value="MU">Mauritius</option>
        
                   
          
        <option value="YT">Mayotte</option>
        
                   
          
        <option value="MX">Mexico</option>
        
                   
          
        <option value="FM">Micronesia - Federated States of</option>
        
                   
          
        <option value="MD">Moldova</option>
        
                   
          
        <option value="MC">Monaco</option>
        
                   
          
        <option value="MN">Mongolia</option>
        
                   
          
        <option value="ME">Montenegro</option>
        
                   
          
        <option value="MS">Montserrat</option>
        
                   
          
        <option value="MA">Morocco</option>
        
                   
          
        <option value="MZ">Mozambique</option>
        
                   
          
        <option value="MM">Myanmar</option>
        
                   
          
        <option value="NA">Namibia</option>
        
                   
          
        <option value="NR">Nauru</option>
        
                   
          
        <option value="NP">Nepal</option>
        
                   
          
        <option value="NL">Netherlands</option>
        
                   
          
        <option value="NC">New Caledonia</option>
        
                   
          
        <option value="NZ">New Zealand</option>
        
                   
          
        <option value="NI">Nicaragua</option>
        
                   
          
        <option value="NE">Niger</option>
        
                   
          
        <option value="NG">Nigeria</option>
        
                   
          
        <option value="NU">Niue</option>
        
                   
          
        <option value="NF">Norfolk Island</option>
        
                   
          
        <option value="KP">North Korea</option>
        
                   
          
        <option value="MP">Northern Mariana Islands</option>
        
                   
          
        <option value="NO">Norway</option>
        
                   
          
        <option value="OM">Oman</option>
        
                   
          
        <option value="PK">Pakistan</option>
        
                   
          
        <option value="PW">Palau</option>
        
                   
          
        <option value="PA">Panama</option>
        
                   
          
        <option value="PG">Papua New Guinea</option>
        
                   
          
        <option value="PY">Paraguay</option>
        
                   
          
        <option value="PE">Peru</option>
        
                   
          
        <option value="PH">Philippines</option>
        
                   
          
        <option value="PN">Pitcairn</option>
        
                   
          
        <option value="PL">Poland</option>
        
                   
          
        <option value="PT">Portugal</option>
        
                   
          
        <option value="PR">Puerto Rico</option>
        
                   
          
        <option value="QA">Qatar</option>
        
                   
          
        <option value="RE">Reunion</option>
        
                   
          
        <option value="RO">Romania</option>
        
                   
          
        <option value="RU">Russia</option>
        
                   
          
        <option value="RW">Rwanda</option>
        
                   
          
        <option value="BL">Saint Barthelemy</option>
        
                   
          
        <option value="SH">Saint Helena</option>
        
                   
          
        <option value="KN">Saint Kitts and Nevis</option>
        
                   
          
        <option value="LC">Saint Lucia</option>
        
                   
          
        <option value="MF">Saint Martin</option>
        
                   
          
        <option value="PM">Saint Pierre and Miquelon</option>
        
                   
          
        <option value="VC">Saint Vincent and the Grenadines</option>
        
                   
          
        <option value="WS">Samoa</option>
        
                   
          
        <option value="SM">San Marino</option>
        
                   
          
        <option value="ST">Sao Tome and Principe</option>
        
                   
          
        <option value="SA">Saudi Arabia</option>
        
                   
          
        <option value="SN">Senegal</option>
        
                   
          
        <option value="RS">Serbia</option>
        
                   
          
        <option value="SC">Seychelles</option>
        
                   
          
        <option value="SL">Sierra Leone</option>
        
                   
          
        <option value="SG">Singapore</option>
        
                   
          
        <option value="SX">Sint Maarten</option>
        
                   
          
        <option value="SK">Slovakia</option>
        
                   
          
        <option value="SI">Slovenia</option>
        
                   
          
        <option value="SB">Solomon Islands</option>
        
                   
          
        <option value="SO">Somalia</option>
        
                   
          
        <option value="ZA">South Africa</option>
        
                   
          
        <option value="GS">South Georgia and the South Sandwich Islands</option>
        
                   
          
        <option value="KR">South Korea</option>
        
                   
          
        <option value="SS">South Sudan</option>
        
                   
          
        <option value="ES">Spain</option>
        
                   
          
        <option value="LK">Sri Lanka</option>
        
                   
          
        <option value="SD">Sudan</option>
        
                   
          
        <option value="SR">Suriname</option>
        
                   
          
        <option value="SJ">Svalbard and Jan Mayen</option>
        
                   
          
        <option value="SZ">Swaziland</option>
        
                   
          
        <option value="SE">Sweden</option>
        
                   
          
        <option value="CH">Switzerland</option>
        
                   
          
        <option value="SY">Syria</option>
        
                   
          
        <option value="TW">Taiwan</option>
        
                   
          
        <option value="TJ">Tajikistan</option>
        
                   
          
        <option value="TZ">Tanzania</option>
        
                   
          
        <option value="TH">Thailand</option>
        
                   
          
        <option value="TG">Togo</option>
        
                   
          
        <option value="TK">Tokelau</option>
        
                   
          
        <option value="TO">Tonga</option>
        
                   
          
        <option value="TT">Trinidad and Tobago</option>
        
                   
          
        <option value="TN">Tunisia</option>
        
                   
          
        <option value="TR">Turkey</option>
        
                   
          
        <option value="TM">Turkmenistan</option>
        
                   
          
        <option value="TC">Turks and Caicos Islands</option>
        
                   
          
        <option value="TV">Tuvalu</option>
        
                   
          
        <option value="UG">Uganda</option>
        
                   
          
        <option value="UA">Ukraine</option>
        
                   
          
        <option value="AE">United Arab Emirates</option>
        
                   
          
        <option value="GB">United Kingdom</option>
        
                   
          
        <option value="US">United States</option>
        
                   
          
        <option value="UM">United States Minor Outlying Islands</option>
        
                   
          
        <option value="VI">United States Virgin Islands</option>
        
                   
          
        <option value="UY">Uruguay</option>
        
                   
          
        <option value="UZ">Uzbekistan</option>
        
                   
          
        <option value="VU">Vanuatu</option>
        
                   
          
        <option value="VE">Venezuela</option>
        
                   
          
        <option value="VN">Vietnam</option>
        
                   
          
        <option value="WF">Wallis and Futuna</option>
        
                   
          
        <option value="PS">West Bank</option>
        
                   
          
        <option value="EH">Western Sahara</option>
        
                   
          
        <option value="YE">Yemen</option>
        
                   
          
        <option value="ZM">Zambia</option>
        
                   
          
        <option value="ZW">Zimbabwe</option>
        
                 
        
      </select>
    </span></div>
    <div> <span class="stats">
      <label for="phone">* <span data-field-name="phone">Phone:</span></label>
      <br />
      <input type="text" id="phone" name="phone" maxlength="40" />
    </span></div>
  </div>
  <div class="space"></div>
  <div class="contentboxcomp">
    <p>By selecting the following boxes, I, in good faith, state that:</p>
    <ul>
      <li id="li_checkbox_confirmation_1">* 
        <input type="checkbox" id="checkbox_confirmation_1" name="confirmation_owner" data-mark-required="li_checkbox_confirmation_1" value='chk' />
        
        <label for="checkbox_confirmation_1">I am the owner or an agent authorised to act on behalf of the owner of an exclusive right that has allegedly been infringed.</label>
      </li>
      <li id="li_checkbox_confirmation_2">* 
        <input type="checkbox" id="checkbox_confirmation_2" name="confirmation_infringe" data-mark-required="li_checkbox_confirmation_2" value='chk' />
        
        <label for="checkbox_confirmation_2">I have a good faith belief that the use of the material in the manner reported by complaint is not authorised by the copyright owner, its agent or the law; and</label>
      </li>
      <li id="li_checkbox_confirmation_3">* 
        <input type="checkbox" id="checkbox_confirmation_3" name="confirmation_accurate" data-mark-required="li_checkbox_confirmation_3" value='chk' />
        
        <label for="checkbox_confirmation_3">This notification is accurate.</label>
      </li>
    </ul>
    <hr />
    <ul>
      <li id="li_checkbox_confirmation_liability">* 
        <input type="checkbox" id="checkbox_confirmation_liability" name="confirmation_liability" data-mark-required="li_checkbox_confirmation_liability" value='chk' />
        
        <label for="checkbox_confirmation_liability">I acknowledge that there may be adverse legal consequences for making false or bad faith allegations of copyright infringement by using this process.</label>
      </li>
      <li id="li_checkbox_confirmation_abuse_termination">* 
        <input type="checkbox" id="checkbox_confirmation_abuse_termination" name="confirmation_abuse_termination" data-mark-required="li_checkbox_confirmation_abuse_termination" value='chk' />
        
        <label for="checkbox_confirmation_abuse_termination">I understand that abuse of this tool will result in termination of my KodiHub account.</label>
      </li>
      <li id="li_checkbox_owner_signature">
        <label for="owner_signature">Typing your full name in this box will act as your digital signature.</label>
        <br />
        *
        ∗ 
        <input id="owner_signature" name="owner_sig" onkeyup="goog.i18n.bidi.setDirAttribute(event,this)" type="text" maxlength="100" />
      </li>
    </ul>
    <?php echo form_close(); ?>
      <div align="center">
        <input type="button" name="sub" id="sub" value="Submit" />
      </div>

    <p>&nbsp;</p>
</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script>
    var filesArray = [];
$("#imgInp1").on('change', function(e)
{
  var files = e.target.files;
       
    var eventTrigger = e.currentTarget.id;
    
      for (var i = 0, f; f = files[i]; i++) {
          var reader = new FileReader();
          reader.onload = (function(theFile) {
            return function(e) {          
              if (eventTrigger=='imgInp1') {
                filesArray[0] = theFile;
              }
              console.log(filesArray);
            };
          })(f);
          reader.readAsDataURL(f);
          readURL(this,"#img1");
      }
});
$("#sub").click(function()
  {
    var data = new FormData();
    for(var i= 0, file; file = filesArray[i]; i++)
    {
        data.append('files[]', file);
    }
    data.append('title', $("#title").val());
    data.append('work', $("#work").val());
    data.append('owner_display_name', $("#owner_display_name").val());
    data.append('requester_title', $("#requester_title2").val());
    data.append('email', $("#email").val());
    data.append('requester_name', $("#requester_name").val());
    data.append('address1', $("#address1").val());
    data.append('address2', $("#address2").val());
    data.append('city', $("#city").val());
    data.append('state', $("#state").val());
    data.append('zip', $("#zip").val());
    data.append('country', $("#country").val());
    data.append('phone', $("#phone").val());
    data.append('ch1', $("#checkbox_confirmation_1:checked").val());
    data.append('ch2', $("#checkbox_confirmation_2:checked").val());
    data.append('ch3', $("#checkbox_confirmation_3:checked").val());
    data.append('ch4', $("#checkbox_confirmation_liability:checked").val());
    data.append('ch5', $("#checkbox_confirmation_abuse_termination:checked").val());
    data.append('owner_signature', $("#owner_signature").val());
    for (var pair of data.entries()) {
    console.log(pair[0]+ ', ' + pair[1]);}
          $.ajax({
              url: '<?php echo base_url(); ?>lodihub/complaintsubmit', 
              type: "POST",            
              data: data,
              contentType: false,       
              cache: false,             
              processData:false,             
              success: function(data)   
              {
                if(data=='Your form will be processed in 24 hours')
                {
                    alert(data);
                    window.location.href = "<?php echo base_url()?>";
                }
                else
                {
                    alert(data);
                }
              }
          }); 


  });  
</script>
</html>