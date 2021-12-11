
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Projects</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Projects List</a></li>
                        <li class="breadcrumb-item active">Create a New Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <form method="post" action="<?= site_url('save-project') ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Project Title</label>
                                    <textarea class="form-control" rows="3" name="project_name" style="width: 100%;"> </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control date" name="start_date" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End date</label>
                                            <input type="date"  class="form-control date" name="end_date" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Budget(numbers only)</label>
                                            <input type="number" class="form-control date" name="start_date" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Currency</label>
                                            <select id="currencyList" type="text" name="currency" class="form-control select2" style="width: 100%;">
                                                <option>select-----</option>
                                                <option value="EUR">Euro (EUR)</option>
                                                <option value="JPY">Japanese yen (JPY)</option>
                                                <option value="GBP">Pound sterling (GBP)</option>
                                                <option value="UGX">Ugandan shilling (UGX)</option>
                                                <option value="USD">United States dollar (USD)</option>
                                                <option value="AED">United Arab Emirates dirham (AED)</option>
                                                <option value="AFN">Afghan afghani (AFN)</option>
                                                <option value="ALL">Albanian lek (ALL)</option>
                                                <option value="ANG">Netherlands Antillean guilder (ANG)</option>
                                                <option value="AOA">Angolan kwanza (AOA)</option>
                                                <option value="ARS">Argentine peso (ARS)</option>
                                                <option value="AUD">Australian dollar (AUD)</option>
                                                <option value="AWG">Aruban florin (AWG)</option>
                                                <option value="AZN">Azerbaijani manat (AZN)</option>
                                                <option value="BAM">Bosnia and Herzegovina convertible mark (BAM)</option>
                                                <option value="BBD">Barbadian dollar (BBD)</option>
                                                <option value="BDT">Bangladeshi taka (BDT)</option>
                                                <option value="BGN">Bulgarian lev (BGN)</option>
                                                <option value="BHD">Bahraini dinar (BHD)</option>
                                                <option value="BIF">Burundian franc (BIF)</option>
                                                <option value="BMD">Bermudian dollar (BMD)</option>
                                                <option value="BND">Brunei dollar (BND)</option>
                                                <option value="BOB">Bolivian boliviano (BOB)</option>
                                                <option value="BRL">Brazilian real (BRL)</option>
                                                <option value="BSD">Bahamian dollar (BSD)</option>
                                                <option value="BTN">Bhutanese ngultrum (BTN)</option>
                                                <option value="BWP">Botswana pula (BWP)</option>
                                                <option value="BYN">Belarusian ruble(BYN)</option>
                                                <option value="BZD">Belize dollar (BZD)</option>
                                                <option value="CAD">Canadian dollar (CAD)</option>
                                                <option value="CDF">Congolese franc (CDF)</option>
                                                <option value="CHF">Swiss franc (CHF)</option>
                                                <option value="CLP">Chilean peso (CLP)</option>
                                                <option value="CNY">Chinese yuan (CNY)</option>
                                                <option value="COP">Colombian peso (COP)</option>
                                                <option value="CRC">Costa Rican colón (CRC)</option>
                                                <option value="CUC">Cuban convertible peso (CUC)</option>
                                                <option value="CUP">Cuban peso (CUP)</option>
                                                <option value="CVE">Cape Verdean escudo (CVE)</option>
                                                <option value="CZK">Czech koruna (CZK)</option>
                                                <option value="DJF">Djiboutian franc (DJF)</option>
                                                <option value="DKK">Danish krone (DKK)</option>
                                                <option value="DOP">Dominican peso (DOP)</option>
                                                <option value="DZD">Algerian dinar (DZD)</option>
                                                <option value="EGP">Egyptian pound (EGP)</option>
                                                <option value="ERN">Eritrean nakfa (ERN)</option>
                                                <option value="ETB">Ethiopian birr (ETB)</option>
                                                <option value="FJD">Fijian dollar (FJD)</option>
                                                <option value="FKP">Falkland Islands pound (FKP)</option>
                                                <option value="GBP">British pound (GBP)</option>
                                                <option value="GEL">Georgian lari (GEL)</option>
                                                <option value="GGP">Guernsey pound (GGP)</option>
                                                <option value="GHS">Ghanaian cedi (GHS)</option>
                                                <option value="GIP">Gibraltar pound (GIP)</option>
                                                <option value="GMD">Gambian dalasi (GMD)</option>
                                                <option value="GNF">Guinean franc (GNF)</option>
                                                <option value="GTQ">Guatemalan quetzal (GTQ)</option>
                                                <option value="GYD">Guyanese dollar (GYD)</option>
                                                <option value="HKD">Hong Kong dollar (HKD)</option>
                                                <option value="HNL">Honduran lempira (HNL)</option>
                                                <option value="HKD">Hong Kong dollar (HKD</option>
                                                <option value="HRK">Croatian kuna (HRK)</option>
                                                <option value="HTG">Haitian gourde (HTG)</option>
                                                <option value="HUF">Hungarian forint (HUF)</option>
                                                <option value="IDR">Indonesian rupiah (IDR)</option>
                                                <option value="ILS">Israeli new shekel (ILS)</option>
                                                <option value="IMP">Manx pound (IMP)</option>
                                                <option value="INR">Indian rupee (INR)</option>
                                                <option value="IQD">Iraqi dinar (IQD)</option>
                                                <option value="IRR">Iranian rial (IRR)</option>
                                                <option value="ISK">Icelandic króna (ISK)</option>
                                                <option value="JEP">Jersey pound (JEP)</option>
                                                <option value="JMD">Jamaican dollar (JMD)</option>
                                                <option value="JOD">Jordanian dinar (JOD)</option>
                                                <option value="JPY">Japanese yen (JPY)</option>
                                                <option value="KES">Kenyan shilling (KES)</option>
                                                <option value="KGS">Kyrgyzstani som (KGS)</option>
                                                <option value="KHR">Cambodian riel (KHR)</option>
                                                <option value="KID">Kiribati dollar (KID)</option>
                                                <option value="KMF">Comorian franc (KMF)</option>
                                                <option value="KPW">North Korean won (KPW)</option>
                                                <option value="KRW">South Korean won (KRW)</option>
                                                <option value="KWD">Kuwaiti dinar (KWD)</option>
                                                <option value="KYD">Cayman Islands dollar (KYD)</option>
                                                <option value="KZT">Kazakhstani tenge (KZT)</option>
                                                <option value="LAK">Lao kip (LAK)</option>
                                                <option value="LBP">Lebanese pound (LBP)</option>
                                                <option value="LKR">Sri Lankan rupee (LKR)</option>
                                                <option value="LRD">Liberian dollar (LRD)</option>
                                                <option value="LSL">Lesotho loti (LSL)</option>
                                                <option value="LYD">Libyan dinar (LYD)</option>
                                                <option value="MAD">Moroccan dirham (MAD)</option>
                                                <option value="MDL">Moldovan leu (MDL)</option>
                                                <option value="MGA">Malagasy ariary (MGA)</option>
                                                <option value="MKD">Macedonian denar (MKD)</option>
                                                <option value="MMK">Burmese kyat (MMK)</option>
                                                <option value="MNT">Mongolian tögrög (MNT)</option>
                                                <option value="MOP">Macanese pataca (MOP)</option>
                                                <option value="MRU">Mauritanian ouguiya (MRU)</option>
                                                <option value="MUR">Mauritian rupee (MUR)</option>
                                                <option value="MVR">Maldivian rufiyaa (MVR)</option>
                                                <option value="MWK">Malawian kwacha (MWK)</option>
                                                <option value="MXN">Mexican peso (MXN)</option>
                                                <option value="MYR">Malaysian ringgit (MYR)</option>
                                                <option value="MZN">Mozambican metical (MZN)</option>
                                                <option value="NAD">Namibian dollar (NAD)</option>
                                                <option value="NGN">Nigerian naira (NGN)</option>
                                                <option value="NIO">Nicaraguan córdoba (NIO)</option>
                                                <option value="NOK">Norwegian krone (NOK)</option>
                                                <option value="NPR">Nepalese rupee (NPR)</option>
                                                <option value="NZD">New Zealand dollar (NZD)</option>
                                                <option value="OMR">Omani rial (OMR)</option>
                                                <option value="PAB">Panamanian balboa (PAB)</option>
                                                <option value="PEN">Peruvian sol (PEN)</option>
                                                <option value="PGK">Papua New Guinean kina (PGK)</option>
                                                <option value="PHP">Philippine peso (PHP)</option>
                                                <option value="PKR">Pakistani rupee (PKR)</option>
                                                <option value="PLN">Polish złoty (PLN)</option>
                                                <option value="PRB">Transnistrian ruble (PRB)</option>
                                                <option value="PYG">Paraguayan guaraní (PYG)</option>
                                                <option value="QAR">Qatari riyal (QAR)</option>
                                                <option value="RON">Romanian leu (RON)</option>
                                                <option value="RSD">Serbian dinar (RSD)</option>
                                                <option value="RUB">Russian ruble (RUB)</option>
                                                <option value="RWF">Rwandan franc (RWF)</option>
                                                <option value="SAR">Saudi riyal (SAR)</option>
                                                <option value="SEK">Swedish krona (SEK)</option>
                                                <option value="SGD">Singapore dollar (SGD)</option>
                                                <option value="SHP">Saint Helena pound (SHP)</option>
                                                <option value="SLL">Sierra Leonean leone (SLL)</option>
                                                <option value="SLS">Somaliland shilling (SLS)</option>
                                                <option value="SOS">Somali shilling (SOS)</option>
                                                <option value="SRD">Surinamese dollar (SRD)</option>
                                                <option value="SSP">South Sudanese pound (SSP)</option>
                                                <option value="STN">São Tomé and Príncipe dobra (STN)</option>
                                                <option value="SYP">Syrian pound (SYP)</option>
                                                <option value="SZL">Swazi lilangeni (SZL)</option>
                                                <option value="THB">Thai baht (THB)</option>
                                                <option value="TJS">Tajikistani somoni (TJS)</option>
                                                <option value="TMT">Turkmenistan manat (TMT)</option>
                                                <option value="TND">Tunisian dinar (TND)</option>
                                                <option value="TOP">Tongan paʻanga (TOP)</option>
                                                <option value="TRY">Turkish lira (TRY)</option>
                                                <option value="TTD">Trinidad and Tobago dollar (TTD)</option>
                                                <option value="TVD">Tuvaluan dollar (TVD)</option>
                                                <option value="TWD">New Taiwan dollar (TWD)</option>
                                                <option value="TZS">Tanzanian shilling (TZS)</option>
                                                <option value="UAH">Ukrainian hryvnia (UAH)</option>
                                                <option value="UYU">Uruguayan peso (UYU)</option>
                                                <option value="UZS">Uzbekistani soʻm (UZS)</option>
                                                <option value="VES">Venezuelan bolívar soberano (VES)</option>
                                                <option value="VND">Vietnamese đồng (VND)</option>
                                                <option value="VUV">Vanuatu vatu (VUV)</option>
                                                <option value="WST">Samoan tālā (WST)</option>
                                                <option value="XAF">Central African CFA franc (XAF)</option>
                                                <option value="XCD">Eastern Caribbean dollar (XCD)</option>
                                                <option value="XOF">West African CFA franc (XOF)</option>
                                                <option value="XPF">CFP franc (XPF)</option>
                                                <option value="ZAR">South African rand (ZAR)</option>
                                                <option value="ZMW">Zambian kwacha (ZMW)</option>
                                                <option value="ZWB">Zimbabwean bonds (ZWB)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="10" name="project_description" style="width: 100%;"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info pull-right">   
                        Save <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
