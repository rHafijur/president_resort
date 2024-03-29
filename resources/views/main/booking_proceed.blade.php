@extends('main.layouts.master')
@section('content')
@php
    $nights=Carbon\Carbon::parse($request->check_in)->diffInDays(Carbon\Carbon::parse($request->check_out));
    $total=0;
@endphp
<style>
    .search-sec{
        margin-top: -12em !important;
    }
    .res{
        margin-left: 12px !important;
        margin-right: 12px !important;
        margin-top: 7em !important;
        margin-bottom: 7em !important;
    }
    .check_in_out{
      font-size: 15px;
    }
    .check_in_out span{
      font-size: 1.2em;
      color:#256fdf;
    }
    .add_button{
      margin-top: 15px;
    }
    .nights{
      margin-top: 10px;
      font-size: 17px;
    }
    .nights span{
      font-size: 1.2em;
      color:#256fdf;
    }
    .total{
      margin-top: 10px;
      font-size: 18px;
    }
    .total span{
      font-size: 1.2em;
      color:#256fdf;
    }
</style>
<section class="promo-wrapper clearfix">
    <div class="promo-outer">
    </div>
</section>
<div>
    <section class="res clearfix">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-8">
                <form action="{{route('payment')}}" method="post">
                    @csrf
                    <input required type="hidden" value="{{$request->check_in}}" name="check_in">
                    <input required type="hidden" value="{{$request->check_out}}" name="check_out">
                    <input required type="hidden" value="{{$request->adults}}" name="adults">
                    <input required type="hidden" value="{{$request->children}}" name="children">
                    <input required type="hidden" value="{{$request->rooms}}" name="rooms">
                    <fieldset>
                        <legend>Contact details</legend>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">Full name *</label>
                            <div class="col-lg-9">
                                <input required type="text" class="form-control" name="name" value="">
                                <div class="field-notice" rel="firstname"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">National Id No. *</label>
                            <div class="col-lg-9">
                                <input required type="text" class="form-control" name="nid" value="">
                                <div class="field-notice" rel="nid"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">E-mail *</label>
                            <div class="col-lg-9">
                                <input required type="text" class="form-control" name="email" value="">
                                <div class="field-notice" rel="email"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">Address *</label>
                            <div class="col-lg-9">
                                <input required type="text" class="form-control" name="address" value="">
                                <div class="field-notice" rel="address"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">Post code *</label>
                            <div class="col-lg-9">
                                <input required type="text" class="form-control" name="postcode" value="">
                                <div class="field-notice" rel="postcode"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">City *</label>
                            <div class="col-lg-9">
                                <input required type="text" class="form-control" name="city" value="">
                                <div class="field-notice" rel="city"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">Country *</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="country">
                                    <option value="">-</option>
                                    <option value="Afghanistan">Afghanistan</option><option value="Åland">Åland</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bonaire">Bonaire</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curacao">Curacao</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar [Burma]">Myanmar [Burma]</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Islands">Pitcairn Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Republic of the Congo">Republic of the Congo</option><option value="Réunion">Réunion</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Barthélemy">Saint Barthélemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Martin">Saint Martin</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="São Tomé and Príncipe">São Tomé and Príncipe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Sint Maarten">Sint Maarten</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="South Korea">South Korea</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option><option value="U.S. Virgin Islands">U.S. Virgin Islands</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>                                    </select>
                                <div class="field-notice" rel="country"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3 control-label">Phone *</label>
                            <div class="col-lg-9">
                                <input required type="text" class="form-control" name="phone" value="">
                                <div class="field-notice" rel="phone"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-3"></label>
                            <div class="col-lg-9">
                                <input required type="checkbox" name="privacy_agreement" value="1"> <small>I agree that the information collected by this form will be stored in a database in order to process my request.<br>In accordance with the "General Data Protection Regulation", you can exercise your right to access to your data and make them rectified via the contact form.</small>                                    <div class="field-notice" rel="privacy_agreement"></div>
                            </div>
                        </div>
                                                        <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <i class="text-muted"> * Required field </i><br>
                                    <button class="btn btn-primary" name="book">Book as guest</button>
                                </div>
                            </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-4">
              <div class="check_in_out">
                Check in <span>{{$request->check_in}}</span> -> Check out <span>{{$request->check_out}}</span>
              </div>
              <div class="nights">
                <span>{{$nights}}</span> Nights; <span>{{$request->adults}}</span> Adults; <span>{{$request->children}}</span> Children;  
              </div>
              <div id="rooms">
                <ul class="list-group list-group-flush">
                    @foreach ($rooms as $room)
                        <li class="list-group-item">{{$room->title}} X {{$room->quantity}}</li>
                        @php
                            $total+=$room->rent * $room->quantity;
                        @endphp
                    @endforeach
                </ul>
              </div>
              <div class="total">
                <span>৳ {{$total * $nights}}</span> Total
              </div>
              <button style="display: none;" onclick="formSubmit()" class="btn btn-success" id="proceed">Proceed</button>
            </div>
        </div>
    </section>
</div>
@endsection
@push('script')
@endpush