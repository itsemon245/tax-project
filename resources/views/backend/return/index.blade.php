@extends('backend.layouts.app')
@section('content')
				@push('customCss')
								<style type="text/css">
												.dotted-border {
																border: 2px dotted var(--ct-dark);
																height: 1.5rem;
																border-top: 0;
																border-right: 0;
																border-left: 0;
														
																
												}


												p {
																margin: 0;
																padding: 0;
																color: #000000;
												}

												.ft10 {
																font-size: 5px;
																font-family: Times;
																color: #000000;
												}

												.ft11 {
																font-size: 12px;
																font-family: Times;
																color: #000000;
												}

												.ft12 {
																font-size: 12px;
																font-family: Times;
																color: #000000;
												}

												.ft13 {
																font-size: 17px;
																font-family: Times;
																color: #000000;
												}

												.ft14 {
																font-size: 17px;
																font-family: Times;
																color: #000000;
												}

												.ft15 {
																font-size: 14px;
																font-family: Times;
																color: #000000;
												}

												.ft16 {
																font-size: 16px;
																font-family: Times;
																color: #000000;
												}

												.ft17 {
																font-size: 14px;
																font-family: Times;
																color: #000000;
												}

												.ft18 {
																font-size: 16px;
																font-family: Times;
																color: #000000;
												}

												.ft19 {
																font-size: 20px;
																font-family: Times;
																color: #000000;
												}

												.ft110 {
																font-size: -1px;
																font-family: Times;
																color: #000000;
												}

												.ft111 {
																font-size: -1px;
																font-family: Times;
																color: #000000;
												}

												.ft112 {
																font-size: 11px;
																font-family: Times;
																color: #000000;
												}

												.ft113 {
																font-size: 19px;
																font-family: Times;
																color: #000000;
												}

												.ft114 {
																font-size: 23px;
																font-family: Times;
																color: #000000;
												}

												.ft115 {
																font-size: 2px;
																font-family: Times;
																color: #000000;
												}

												.ft116 {
																font-size: 11px;
																font-family: Times;
																color: #000000;
												}

												.ft117 {
																font-size: 10px;
																font-family: Times;
																color: #000000;
												}

												.ft118 {
																font-size: 1px;
																font-family: Times;
																color: #000000;
												}

												.ft119 {
																font-size: 3px;
																font-family: Times;
																color: #000000;
												}

												.ft120 {
																font-size: 8px;
																font-family: Times;
																color: #000000;
												}

												.ft121 {
																font-size: 25px;
																font-family: Times;
																color: #000000;
												}

												.ft122 {
																font-size: 19px;
																font-family: Times;
																color: #000000;
												}

												.ft123 {
																font-size: 21px;
																font-family: Times;
																color: #808080;
												}

												.ft124 {
																font-size: 14px;
																line-height: 18px;
																font-family: Times;
																color: #000000;
												}

												.ft125 {
																font-size: 16px;
																line-height: 20px;
																font-family: Times;
																color: #000000;
												}

												.ft126 {
																font-size: 8px;
																line-height: 13px;
																font-family: Times;
																color: #000000;
												}

												.ft127 {
																font-size: 17px;
																line-height: 25px;
																font-family: Times;
																color: #000000;
												}

												.ft128 {
																font-size: 17px;
																line-height: 21px;
																font-family: Times;
																color: #000000;
												}

												.ft129 {
																font-size: 17px;
																line-height: 25px;
																font-family: Times;
																color: #000000;
												}

												.ft130 {
																font-size: 17px;
																line-height: 29px;
																font-family: Times;
																color: #000000;
												}

												.ft131 {
																font-size: 12px;
																line-height: 17px;
																font-family: Times;
																color: #000000;
												}
								</style>
				@endpush

				{{-- page one  --}}
				<div class="card mb-3"style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target001.png') }}" alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft10">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft12"><b>&#160;</b></p>
								<p style="position:absolute;top:59px;left:469px;white-space:nowrap" class="ft13"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;
																&#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;</b></p>
								<p style="position:absolute;top:81px;left:112px;white-space:nowrap" class="ft13"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;
																&#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;National Board of
																Revenue</b>&#160; &#160;&#160;&#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160;
												&#160;<b>IT-11GA(2023)</b>&#160;</p>
								<p style="position:absolute;top:103px;left:410px;white-space:nowrap" class="ft14">www.nbr.gov.bd.&#160;</p>
								<p style="position:absolute;top:123px;left:478px;white-space:nowrap" class="ft10">&#160;</p>
								<p style="position:absolute;top:134px;left:478px;white-space:nowrap" class="ft124">
												&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:191px;left:478px;white-space:nowrap" class="ft16"><b>&#160;</b></p>
								<p style="position:absolute;top:212px;left:108px;white-space:nowrap" class="ft17"><b>&#160;</b></p>
								<p style="position:absolute;top:231px;left:108px;white-space:nowrap" class="ft125"><b>&#160;<br /></b>&#160;
								</p>
								<p style="position:absolute;top:273px;left:108px;white-space:nowrap" class="ft19"><b>&#160;</b></p>
								<p style="position:absolute;top:294px;left:108px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:296px;left:469px;white-space:nowrap" class="ft111"><b>&#160;</b></p>
								<p style="position:absolute;top:297px;left:108px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:295px;left:61px;white-space:nowrap" class="ft15">&#160; &#160;&#160;</p>
								<p style="position:absolute;top:301px;left:77px;white-space:nowrap" class="ft10">&#160;</p>
								<p style="position:absolute;top:309px;left:41px;white-space:nowrap" class="ft16"><b>&#160; &#160;</b></p>
								<p style="position:absolute;top:312px;left:54px;white-space:nowrap" class="ft112"><b>&#160;</b></p>
								<p style="position:absolute;top:336px;left:57px;white-space:nowrap" class="ft14">1.&#160;</p>
								<p style="position:absolute;top:335px;left:84px;white-space:nowrap" class="ft113">Name of the Taxpayer</p>
								<p style="position:absolute;top:336px;left:273px;white-space:nowrap" class="ft14 w-100">
									<input id=""class="dotted-border" style="width:550px;" name="" type="text" />
								</p>
								<p style="position:absolute;top:337px;left:822px;white-space:nowrap" class="ft18">&#160;</p>
								<p style="position:absolute;top:360px;left:84px;white-space:nowrap" class="ft115">&#160;</p>
								<p style="position:absolute;top:370px;left:57px;white-space:nowrap" class="ft14">2.&#160;&#160;National
												ID&#160;No./Passport&#160;No.&#160;(if&#160;No NID)&#160;:&#160;</p>
								<p style="position:absolute;top:371px;left:429px;white-space:nowrap" class="ft18">
												.&#160;………..……...………………………...……….........&#160;</p>
								<p style="position:absolute;top:391px;left:162px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:393px;left:84px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:395px;left:54px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:401px;left:527px;white-space:nowrap" class="ft14">&#160;&#160;</p>
								<p style="position:absolute;top:442px;left:54px;white-space:nowrap" class="ft18">&#160;4. &#160;(a) Circle:
												&#160;..................</p>
								<p style="position:absolute;top:437px;left:244px;white-space:nowrap" class="ft114"><b>54</b></p>
								<p style="position:absolute;top:442px;left:270px;white-space:nowrap" class="ft18">
												................................&#160;(b)&#160;Taxes Zone: &#160;......</p>
								<p style="position:absolute;top:437px;left:569px;white-space:nowrap" class="ft114"><b>03</b></p>
								<p style="position:absolute;top:439px;left:595px;white-space:nowrap" class="ft19"><b>.</b></p>
								<p style="position:absolute;top:442px;left:601px;white-space:nowrap" class="ft18">....Chattogram.………….……&#160;
								</p>
								<p style="position:absolute;top:475px;left:54px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:482px;left:54px;white-space:nowrap" class="ft18">&#160;5.&#160;</p>
								<p style="position:absolute;top:481px;left:77px;white-space:nowrap" class="ft14">Assessment&#160;Year</p>
								<p style="position:absolute;top:482px;left:211px;white-space:nowrap" class="ft18">:&#160; &#160;&#160;&#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160; &#160; &#160; &#160;&#160;6.&#160;</p>
								<p style="position:absolute;top:481px;left:432px;white-space:nowrap" class="ft14">Residential</p>
								<p style="position:absolute;top:485px;left:520px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:481px;left:524px;white-space:nowrap" class="ft14">Status:&#160;Resident &#160;
												&#160;</p>
								<p style="position:absolute;top:480px;left:670px;white-space:nowrap" class="ft14">&#160;
												&#160;Non-resident&#160;</p>
								<p style="position:absolute;top:503px;left:54px;white-space:nowrap" class="ft18">&#160;</p>
								<p style="position:absolute;top:506px;left:68px;white-space:nowrap" class="ft116">&#160;</p>
								<p style="position:absolute;top:521px;left:54px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:528px;left:54px;white-space:nowrap" class="ft18">7.&#160;&#160;</p>
								<p style="position:absolute;top:523px;left:77px;white-space:nowrap" class="ft14">Taxpayer’s&#160;Status</p>
								<p style="position:absolute;top:528px;left:217px;white-space:nowrap" class="ft18">:&#160;</p>
								<p style="position:absolute;top:529px;left:226px;white-space:nowrap" class="ft15">&#160;&#160;</p>
								<p style="position:absolute;top:527px;left:235px;white-space:nowrap" class="ft14">&#160;</p>
								<p style="position:absolute;top:528px;left:239px;white-space:nowrap" class="ft16"><b>Individual
																&#160;&#160;</b>&#160;&#160; &#160; &#160; &#160;&#160;</p>
								<p style="position:absolute;top:527px;left:374px;white-space:nowrap" class="ft14">&#160;Firm &#160;
												&#160;&#160;</p>
								<p style="position:absolute;top:528px;left:441px;white-space:nowrap" class="ft18">&#160; &#160;&#160;Hindu
												Undivided Family&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160;Others&#160;&#160;</p>
								<p style="position:absolute;top:551px;left:54px;white-space:nowrap" class="ft117">&#160;</p>
								<p style="position:absolute;top:570px;left:54px;white-space:nowrap" class="ft18">8. &#160;&#160;</p>
								<p style="position:absolute;top:569px;left:81px;white-space:nowrap" class="ft14">Tick on the&#160;box
												for&#160;getting special benefit:</p>
								<p style="position:absolute;top:580px;left:414px;white-space:nowrap" class="ft118">&#160;</p>
								<p style="position:absolute;top:591px;left:54px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:593px;left:54px;white-space:nowrap" class="ft119">&#160;</p>
								<p style="position:absolute;top:603px;left:54px;white-space:nowrap" class="ft113">&#160;&#160;&#160;&#160;
								</p>
								<p style="position:absolute;top:604px;left:75px;white-space:nowrap" class="ft14">
												A&#160;gazette&#160;war-wounded freedom fighter</p>
								<p style="position:absolute;top:606px;left:388px;white-space:nowrap" class="ft15">&#160;</p>
								<p style="position:absolute;top:604px;left:432px;white-space:nowrap" class="ft14">&#160;</p>
								<p style="position:absolute;top:605px;left:437px;white-space:nowrap" class="ft16"><b>Female</b></p>
								<p style="position:absolute;top:604px;left:493px;white-space:nowrap" class="ft13"><b>&#160;&#160;</b>&#160;
								</p>
								<p style="position:absolute;top:605px;left:507px;white-space:nowrap" class="ft18">&#160;&#160; &#160;&#160;
								</p>
								<p style="position:absolute;top:604px;left:530px;white-space:nowrap" class="ft14">Third gender &#160;
												&#160;&#160;</p>
								<p style="position:absolute;top:605px;left:656px;white-space:nowrap" class="ft18">&#160;&#160;&#160;
												&#160;Disable person&#160;</p>
								<p style="position:absolute;top:627px;left:54px;white-space:nowrap" class="ft115">&#160;</p>
								<p style="position:absolute;top:638px;left:54px;white-space:nowrap" class="ft18">&#160; &#160;</p>
								<p style="position:absolute;top:639px;left:68px;white-space:nowrap" class="ft15">&#160;&#160;</p>
								<p style="position:absolute;top:637px;left:76px;white-space:nowrap" class="ft14">Aged 65&#160;years
												or&#160;more</p>
								<p style="position:absolute;top:639px;left:254px;white-space:nowrap" class="ft15">&#160; &#160;
												&#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160;
												&#160;&#160;&#160; &#160;&#160;&#160; &#160;</p>
								<p style="position:absolute;top:636px;left:407px;white-space:nowrap" class="ft113">
												A&#160;parent&#160;of&#160;a person&#160;with&#160;disability</p>
								<p style="position:absolute;top:638px;left:704px;white-space:nowrap" class="ft18">&#160;</p>
								<p style="position:absolute;top:658px;left:54px;white-space:nowrap" class="ft18">&#160;&#160;&#160;</p>
								<p style="position:absolute;top:662px;left:442px;white-space:nowrap" class="ft117">&#160;</p>
								<p style="position:absolute;top:685px;left:54px;white-space:nowrap" class="ft120">&#160;</p>
								<p style="position:absolute;top:685px;left:68px;white-space:nowrap" class="ft120">&#160;</p>
								<p style="position:absolute;top:685px;left:378px;white-space:nowrap" class="ft120">&#160;&#160;</p>
								<p style="position:absolute;top:680px;left:383px;white-space:nowrap" class="ft18">10.Wife/Husband’s Name:
												……………………..…………..</p>
								<p style="position:absolute;top:685px;left:814px;white-space:nowrap" class="ft120">&#160;</p>
								<p style="position:absolute;top:707px;left:54px;white-space:nowrap" class="ft120">&#160;</p>
								<p style="position:absolute;top:707px;left:68px;white-space:nowrap" class="ft120">&#160;</p>
								<p style="position:absolute;top:707px;left:378px;white-space:nowrap" class="ft120">&#160; &#160;&#160;</p>
								<p style="position:absolute;top:703px;left:388px;white-space:nowrap" class="ft15">
												TIN&#160;(if&#160;spouse&#160;is a&#160;Taxpayer):&#160;&#160;………………..………..………..</p>
								<p style="position:absolute;top:707px;left:818px;white-space:nowrap" class="ft120">&#160;</p>
								<p style="position:absolute;top:723px;left:54px;white-space:nowrap" class="ft126">&#160;<br />&#160;</p>
								<p style="position:absolute;top:753px;left:54px;white-space:nowrap" class="ft129">
												11.&#160;Address:<b>&#160;&#160;&#160;</b>……………………………………….……………………………………..……….<b>&#160;&#160;&#160;<br />&#160;</b>……………………………………………………………………………………………………..&#160;&#160;<br />…………………………………………………Telephone:.…………..…………………………..&#160;<br />Mobile:…………………………………………e-mail:……...…………..………………………..&#160;<br />&#160;<br />12.
												&#160;If&#160;employed, employer’s name:( latest&#160;employer’s name in case
												of&#160;multiple&#160;employment):&#160;&#160;</p>
								<p style="position:absolute;top:906px;left:54px;white-space:nowrap" class="ft120">&#160;</p>
								<p style="position:absolute;top:918px;left:54px;white-space:nowrap" class="ft14">
												……………………………………………………...…………………………..…….………………&#160;</p>
								<p style="position:absolute;top:946px;left:54px;white-space:nowrap" class="ft117">&#160;</p>
								<p style="position:absolute;top:964px;left:54px;white-space:nowrap" class="ft129">12.&#160;&#160;(a) Name
												of&#160;Organization:&#160;............................................................................................................&#160;<br />&#160;<br />&#160;
												&#160; &#160; &#160;&#160;(b) Business&#160;Identification&#160;Number
												(BIN):..………………………..…………………………..&#160;<br />&#160;</p>
								<p style="position:absolute;top:1068px;left:54px;white-space:nowrap" class="ft14">
												13.&#160;Name&#160;and&#160;TIN&#160;of&#160;Partners/Members in&#160;case</p>
								<p style="position:absolute;top:1067px;left:428px;white-space:nowrap" class="ft113">&#160;of Firm/</p>
								<p style="position:absolute;top:1068px;left:502px;white-space:nowrap" class="ft14">Associate of&#160;Person
								</p>
								<p style="position:absolute;top:1067px;left:657px;white-space:nowrap" class="ft113">:</p>
								<p style="position:absolute;top:1070px;left:663px;white-space:nowrap" class="ft15">&#160;</p>
								<p style="position:absolute;top:1090px;left:68px;white-space:nowrap" class="ft14">
												…………………………………………………………………………….…………….…………..&#160;</p>
								<p style="position:absolute;top:1116px;left:54px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:1118px;left:54px;white-space:nowrap" class="ft14">
												……………………………………………………………………………….………………………..&#160;</p>
								<p style="position:absolute;top:1144px;left:54px;white-space:nowrap" class="ft118">&#160;</p>
								<p style="position:absolute;top:1148px;left:54px;white-space:nowrap" class="ft14">
												…………………………………………………………………………………………………...……</p>
								<p style="position:absolute;top:1153px;left:829px;white-space:nowrap" class="ft18">&#160;</p>
								<p style="position:absolute;top:1174px;left:54px;white-space:nowrap" class="ft118">&#160;</p>
								<p style="position:absolute;top:1178px;left:54px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:1183px;left:442px;white-space:nowrap" class="ft18">&#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;</p>
								<div style="position:absolute;top:400px;left:130px;white-space:nowrap;" class="d-flex">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
												<input style="width:32px!important;" class="ft16">
								</div>
								<p style="position:absolute;top:158px;left:41px;white-space:nowrap" class="ft17"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160;</b></p>
								<p style="position:absolute;top:145px;left:103px;white-space:nowrap" class="ft121">
									<b>For Official Use</b>
								</p>
								<p style="position:absolute;top:158px;left:288px;white-space:nowrap" class="ft17"><b>&#160;</b></p>
								<p style="position:absolute;top:181px;left:41px;white-space:nowrap" class="ft15">
												Serial&#160;No.&#160;of&#160;Return Register<b>&#160;</b></p>
								<p style="position:absolute;top:182px;left:278px;white-space:nowrap" class="ft17"><b>&#160;</b></p>
								<p style="position:absolute;top:205px;left:41px;white-space:nowrap" class="ft15">Volume No. of Return
												Register<b>&#160;</b></p>
								<p style="position:absolute;top:205px;left:278px;white-space:nowrap" class="ft17"><b>&#160;</b></p>
								<p style="position:absolute;top:232px;left:41px;white-space:nowrap" class="ft15">Date of&#160;Return
												Submission<b>&#160;</b></p>
								<p style="position:absolute;top:232px;left:278px;white-space:nowrap" class="ft17"><b>&#160;</b></p>
								<p style="position:absolute;top:255px;left:40px;white-space:nowrap" class="ft17"><b>&#160;</b></p>
								<p style="position:absolute;top:181px;left:439px;white-space:nowrap" class="ft122">
												<b>FORM&#160;OF&#160;RETURN&#160;OF&#160;INCOME&#160;</b>
								</p>
								<p style="position:absolute;top:206px;left:485px;white-space:nowrap" class="ft122">
												<b>FOR&#160;NATURL&#160;PERSON&#160;</b>
								</p>
								<p style="position:absolute;top:404px;left:57px;white-space:nowrap" class="ft14">3.&#160;&#160;TIN:&#160;
								</p>
								<p style="position:absolute;top:487px;left:802px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:487px;left:664px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:484px;left:231px;white-space:nowrap" class="ft16">

												<b>2&#160;&#160;0&#160;&#160;2&#160;&#160;3&#160;&#160;-&#160;&#160;2&#160;&#160;4&#160;</b>
								</p>

								<p style="position:absolute;top:505px;left:231px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:609px;left:510px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:610px;left:654px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:610px;left:416px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:644px;left:299px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:646px;left:801px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:613px;left:801px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:689px;left:88px;white-space:nowrap" class="ft131"><b>Date&#160;of&#160;Birth
																(DD-MM-YY)&#160;<br /></b>&#160;</p>
								<p style="position:absolute;top:707px;left:113px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:138px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:163px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:188px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:213px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:238px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:263px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:288px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:707px;left:313px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:734px;left:88px;white-space:nowrap" class="ft11">&#160;</p>
								<p style="position:absolute;top:690px;left:51px;white-space:nowrap" class="ft15">9</p>
								<p style="position:absolute;top:691px;left:60px;white-space:nowrap" class="ft11">.&#160;</p>
				</div>
				{{-- page two --}}
				<div class="card mb-3" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target002.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft20">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft21">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft22"><b>&#160;</b></p>
								<p style="position:absolute;top:57px;left:469px;white-space:nowrap" class="ft23"><b>&#160;</b></p>
								<p style="position:absolute;top:73px;left:469px;white-space:nowrap" class="ft24"><b>&#160;</b></p>
								<p style="position:absolute;top:95px;left:111px;white-space:nowrap" class="ft25"><b>Statement of
																&#160;Income&#160;and&#160;Tax&#160;during&#160;the&#160;Income&#160;Year
																ended&#160;&#160;….30/06/2023</b></p>
								<p style="position:absolute;top:96px;left:793px;white-space:nowrap" class="ft26">.......&#160;</p>
								<p style="position:absolute;top:115px;left:469px;white-space:nowrap" class="ft219"><b>&#160;<br />&#160;</b>
								</p>
								<p style="position:absolute;top:118px;left:108px;white-space:nowrap" class="ft28">&#160;</p>
								<p style="position:absolute;top:125px;left:108px;white-space:nowrap" class="ft25"><b>&#160;&#160;Name of the
																Taxpayer</b></p>
								<p style="position:absolute;top:123px;left:319px;white-space:nowrap" class="ft29">
												<b>………………………………………………………………………..&#160;</b>
								</p>
								<p style="position:absolute;top:145px;left:108px;white-space:nowrap" class="ft210"><b>&#160;</b></p>
								<p style="position:absolute;top:150px;left:469px;white-space:nowrap" class="ft20">&#160;</p>
								<p style="position:absolute;top:164px;left:126px;white-space:nowrap" class="ft211">TIN:&#160;</p>
								<p style="position:absolute;top:192px;left:152px;white-space:nowrap" class="ft21">&#160;</p>
								<p style="position:absolute;top:209px;left:469px;white-space:nowrap" class="ft21">&#160;</p>
								<p style="position:absolute;top:225px;left:108px;white-space:nowrap" class="ft212"><b>&#160;</b></p>
								<p style="position:absolute;top:225px;left:563px;white-space:nowrap" class="ft212"><b>&#160;</b></p>
								<p style="position:absolute;top:235px;left:71px;white-space:nowrap" class="ft213"><b>Serial&#160;</b></p>
								<p style="position:absolute;top:254px;left:81px;white-space:nowrap" class="ft213"><b>No&#160;</b></p>
								<p style="position:absolute;top:236px;left:283px;white-space:nowrap" class="ft24"><b>Particulars&#160;of
																Total Income</b></p>
								<p style="position:absolute;top:238px;left:513px;white-space:nowrap" class="ft213"><b>&#160;</b></p>
								<p style="position:absolute;top:236px;left:684px;white-space:nowrap" class="ft24"><b>Amount in Taka</b></p>
								<p style="position:absolute;top:238px;left:822px;white-space:nowrap" class="ft213"><b>&#160;</b></p>
								<p style="position:absolute;top:277px;left:81px;white-space:nowrap" class="ft214">1.&#160;</p>
								<p style="position:absolute;top:275px;left:108px;white-space:nowrap" class="ft24"><b>&#160;&#160;</b>Income
												from&#160;Employment&#160;(annex&#160;Schedule&#160;1)&#160;</p>
								<p style="position:absolute;top:276px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:314px;left:81px;white-space:nowrap" class="ft214">2.&#160;</p>
								<p style="position:absolute;top:312px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												from&#160;Rent&#160;(annex&#160;Schedule&#160;2)&#160;</p>
								<p style="position:absolute;top:310px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:345px;left:81px;white-space:nowrap" class="ft214">3.&#160;</p>
								<p style="position:absolute;top:343px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												from&#160;Agricultural (annex&#160;Schedule&#160;3)&#160;</p>
								<p style="position:absolute;top:340px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:376px;left:81px;white-space:nowrap" class="ft214">4.&#160;</p>
								<p style="position:absolute;top:374px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												from&#160;Business&#160;(annex&#160;Schedule 4)&#160;&#160;</p>
								<p style="position:absolute;top:371px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:410px;left:81px;white-space:nowrap" class="ft214">5.&#160;</p>
								<p style="position:absolute;top:408px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												from&#160;Capital&#160;Gains&#160;</p>
								<p style="position:absolute;top:403px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:445px;left:81px;white-space:nowrap" class="ft214">6.&#160;</p>
								<p style="position:absolute;top:443px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												from&#160;financial&#160;Assets&#160;</p>
								<p style="position:absolute;top:446px;left:365px;white-space:nowrap" class="ft21">(Bank&#160;Interest
												/&#160;Dividend,&#160;Securities&#160;Profit&#160;etc)</p>
								<p style="position:absolute;top:443px;left:649px;white-space:nowrap" class="ft26">&#160;</p>
								<p style="position:absolute;top:438px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:478px;left:81px;white-space:nowrap" class="ft214">7.&#160;</p>
								<p style="position:absolute;top:476px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												from&#160;Other&#160;sources&#160;</p>
								<p style="position:absolute;top:480px;left:348px;white-space:nowrap" class="ft215">
												(Royality,&#160;License&#160;Fee,&#160;Honorarium,&#160;Govt.&#160;Incentive&#160;Etc.)</p>
								<p style="position:absolute;top:476px;left:664px;white-space:nowrap" class="ft26">&#160;</p>
								<p style="position:absolute;top:473px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:511px;left:81px;white-space:nowrap" class="ft214">8.&#160;</p>
								<p style="position:absolute;top:509px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												from&#160;Firm&#160;or&#160;AoP&#160;</p>
								<p style="position:absolute;top:504px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:544px;left:81px;white-space:nowrap" class="ft214">9.&#160;</p>
								<p style="position:absolute;top:542px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Income
												of&#160;minor or&#160;spouse (if&#160;not&#160;&#160;Taxpayer)&#160;</p>
								<p style="position:absolute;top:538px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:579px;left:81px;white-space:nowrap" class="ft214">10.&#160;</p>
								<p style="position:absolute;top:577px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Taxable Income
												from&#160;Abroad&#160;</p>
								<p style="position:absolute;top:572px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:614px;left:81px;white-space:nowrap" class="ft214">11.&#160;</p>
								<p style="position:absolute;top:612px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;<b>Total
																income (Aggregate of 1 to&#160;10)&#160;</b></p>
								<p style="position:absolute;top:606px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:643px;left:69px;white-space:nowrap" class="ft24"><b>&#160;</b></p>
								<p style="position:absolute;top:668px;left:69px;white-space:nowrap" class="ft216"><b>&#160;</b></p>
								<p style="position:absolute;top:700px;left:69px;white-space:nowrap" class="ft24">
												<b>Tax&#160;Computation&#160;</b>
								</p>
								<p style="position:absolute;top:643px;left:822px;white-space:nowrap" class="ft220"><b>&#160;<br />&#160;</b>
								</p>
								<p style="position:absolute;top:690px;left:706px;white-space:nowrap" class="ft213"><b>Amount&#160;in Taka</b>
								</p>
								<p style="position:absolute;top:687px;left:822px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:728px;left:81px;white-space:nowrap" class="ft214">12.&#160;</p>
								<p style="position:absolute;top:726px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Gross
												Tax&#160;on Taxable Income&#160;&#160;</p>
								<p style="position:absolute;top:723px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:761px;left:81px;white-space:nowrap" class="ft214">13.&#160;</p>
								<p style="position:absolute;top:759px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Tax Rebate
												(annex&#160;Schedule 5) &#160; &#160; &#160;&#160; &#160;&#160;</p>
								<p style="position:absolute;top:754px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:796px;left:81px;white-space:nowrap" class="ft214">14.&#160;</p>
								<p style="position:absolute;top:794px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Net Tax
												after&#160;Rebate&#160;(12-13)&#160;</p>
								<p style="position:absolute;top:789px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:830px;left:81px;white-space:nowrap" class="ft214">15.&#160;</p>
								<p style="position:absolute;top:828px;left:108px;white-space:nowrap" class="ft26">
												&#160;&#160;Minimum&#160;Tax&#160;</p>
								<p style="position:absolute;top:824px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:864px;left:81px;white-space:nowrap" class="ft214">16.&#160;</p>
								<p style="position:absolute;top:862px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;Tax
												Payable&#160;(Higher&#160;of&#160;14 and 15)&#160;</p>
								<p style="position:absolute;top:858px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:892px;left:81px;white-space:nowrap" class="ft214">17.&#160;</p>
								<p style="position:absolute;top:890px;left:108px;white-space:nowrap" class="ft26">&#160;&#160;(a)&#160;Net
												wealth&#160;Surcharge &#160;(if&#160;applicable)&#160;</p>
								<p style="position:absolute;top:891px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:930px;left:103px;white-space:nowrap" class="ft26">&#160;</p>
								<p style="position:absolute;top:930px;left:130px;white-space:nowrap" class="ft26">
												(b)&#160;Environmental&#160;surcharge (if&#160;applicable)&#160;</p>
								<p style="position:absolute;top:924px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:976px;left:81px;white-space:nowrap" class="ft214">18.&#160;</p>
								<p style="position:absolute;top:975px;left:108px;white-space:nowrap" class="ft26">&#160;</p>
								<p style="position:absolute;top:963px;left:130px;white-space:nowrap" class="ft221">Delay&#160;Interest,
												penalty&#160;or any&#160;other&#160;amount under the Tncome Tax&#160;<br />Act (if&#160;any)&#160;</p>
								<p style="position:absolute;top:960px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:1020px;left:81px;white-space:nowrap" class="ft214">19.&#160;</p>
								<p style="position:absolute;top:1018px;left:108px;white-space:nowrap" class="ft26">
												&#160;&#160;<b>Total&#160;Amount&#160;Payable (16 +&#160;17 +&#160;18)&#160;</b></p>
								<p style="position:absolute;top:1014px;left:753px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:1044px;left:108px;white-space:nowrap" class="ft217"><i><b>&#160;</b></i></p>
								<p style="position:absolute;top:1045px;left:449px;white-space:nowrap" class="ft28">&#160;</p>
								<p style="position:absolute;top:1052px;left:449px;white-space:nowrap" class="ft222"><b>&#160;<br />&#160;</b>
								</p>
								<p style="position:absolute;top:1095px;left:108px;white-space:nowrap" class="ft223">
												&#160;<br />&#160;<br />&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:1179px;left:469px;white-space:nowrap" class="ft210"><b>&#160;</b></p>
								<p style="position:absolute;top:1186px;left:469px;white-space:nowrap" class="ft210"><b>&#160;</b></p>
								<p style="position:absolute;top:165px;left:219px;white-space:nowrap" class="ft25"><b>8&#160;</b></p>
								<p style="position:absolute;top:165px;left:259px;white-space:nowrap" class="ft25"><b>7&#160;</b></p>
								<p style="position:absolute;top:165px;left:299px;white-space:nowrap" class="ft25"><b>4&#160;</b></p>
								<p style="position:absolute;top:165px;left:338px;white-space:nowrap" class="ft25"><b>9&#160;</b></p>
								<p style="position:absolute;top:165px;left:378px;white-space:nowrap" class="ft25"><b>5&#160;</b></p>
								<p style="position:absolute;top:165px;left:418px;white-space:nowrap" class="ft25"><b>8&#160;</b></p>
								<p style="position:absolute;top:165px;left:456px;white-space:nowrap" class="ft25"><b>6&#160;</b></p>
								<p style="position:absolute;top:165px;left:494px;white-space:nowrap" class="ft25"><b>4&#160;</b></p>
								<p style="position:absolute;top:165px;left:532px;white-space:nowrap" class="ft25"><b>9&#160;</b></p>
								<p style="position:absolute;top:165px;left:571px;white-space:nowrap" class="ft25"><b>0&#160;</b></p>
								<p style="position:absolute;top:165px;left:612px;white-space:nowrap" class="ft25"><b>2&#160;</b></p>
								<p style="position:absolute;top:165px;left:654px;white-space:nowrap" class="ft25"><b>&#160;</b></p>
								<p style="position:absolute;top:165px;left:696px;white-space:nowrap" class="ft25"><b>5&#160;</b></p>
				</div>
				{{-- page three --}}
				<div class="card mb-3" id="page3-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target003.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft30">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft31">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft32"><b>&#160;</b></p>
								<p style="position:absolute;top:58px;left:69px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:85px;left:69px;white-space:nowrap" class="ft33"><b>Particulars of&#160;Tax
																Payment&#160;&#160;</b></p>
								<p style="position:absolute;top:86px;left:290px;white-space:nowrap" class="ft34"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160;</b></p>
								<p style="position:absolute;top:86px;left:672px;white-space:nowrap" class="ft34">
												<b>&#160;&#160;Amount&#160;in Taka&#160;</b>
								</p>
								<p style="position:absolute;top:116px;left:78px;white-space:nowrap" class="ft35">20.&#160;</p>
								<p style="position:absolute;top:114px;left:105px;white-space:nowrap" class="ft36">
												<b>&#160;&#160;</b>Tax&#160;Deducted or&#160;Collected at&#160;Source (attach&#160;proof)&#160;
								</p>
								<p style="position:absolute;top:114px;left:660px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:114px;left:816px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:145px;left:78px;white-space:nowrap" class="ft35">21.&#160;</p>
								<p style="position:absolute;top:143px;left:105px;white-space:nowrap" class="ft37">&#160;&#160;Advance Tax
												paid (attach proof)&#160;</p>
								<p style="position:absolute;top:143px;left:660px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:143px;left:816px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:181px;left:78px;white-space:nowrap" class="ft35">22.&#160;</p>
								<p style="position:absolute;top:179px;left:105px;white-space:nowrap" class="ft37">&#160;</p>
								<p style="position:absolute;top:168px;left:123px;white-space:nowrap" class="ft324">Adjustment of&#160;tax
												refund [mention assessment&#160;<br />year(s) of&#160;refund]&#160;</p>
								<p style="position:absolute;top:168px;left:660px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:168px;left:816px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:218px;left:78px;white-space:nowrap" class="ft35">23.&#160;</p>
								<p style="position:absolute;top:216px;left:105px;white-space:nowrap" class="ft37">&#160;&#160;Tax Paid
												with&#160;this&#160;&#160;Return&#160;&#160;</p>
								<p style="position:absolute;top:214px;left:660px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:214px;left:816px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:246px;left:78px;white-space:nowrap" class="ft35">24.&#160;</p>
								<p style="position:absolute;top:244px;left:105px;white-space:nowrap" class="ft37">
												&#160;&#160;Total&#160;Tax&#160;Paid and&#160;Adjusted&#160;&#160;(20 +&#160;21 + 22 +&#160;23)&#160;</p>
								<p style="position:absolute;top:242px;left:660px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:242px;left:816px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:276px;left:78px;white-space:nowrap" class="ft35">25.&#160;</p>
								<p style="position:absolute;top:274px;left:105px;white-space:nowrap" class="ft37">
												&#160;&#160;Excess&#160;Payment&#160;(24-19)&#160;</p>
								<p style="position:absolute;top:271px;left:816px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:302px;left:88px;white-space:nowrap" class="ft37">&#160;</p>
								<p style="position:absolute;top:299px;left:123px;white-space:nowrap" class="ft39">&#160;</p>
								<p style="position:absolute;top:312px;left:123px;white-space:nowrap" class="ft310">&#160;</p>
								<p style="position:absolute;top:301px;left:660px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:301px;left:816px;white-space:nowrap" class="ft38"><b>&#160;</b></p>
								<p style="position:absolute;top:330px;left:78px;white-space:nowrap" class="ft35">26.&#160;</p>
								<p style="position:absolute;top:328px;left:105px;white-space:nowrap" class="ft37">
												&#160;&#160;Tax&#160;Exempted / Tax&#160;Free&#160;Income ( attach proof)&#160;</p>
								<p style="position:absolute;top:328px;left:710px;white-space:nowrap" class="ft37">&#160;</p>
								<p style="position:absolute;top:350px;left:469px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:382px;left:277px;white-space:nowrap" class="ft36"><b>List of Documents
																Furnished with this Return</b></p>
								<p style="position:absolute;top:379px;left:661px;white-space:nowrap" class="ft311">&#160;</p>
								<p style="position:absolute;top:401px;left:69px;white-space:nowrap" class="ft35">1.&#160;&#160;</p>
								<p style="position:absolute;top:408px;left:89px;white-space:nowrap" class="ft310">&#160;</p>
								<p style="position:absolute;top:420px;left:69px;white-space:nowrap" class="ft325">&#160;<br />&#160;</p>
								<p style="position:absolute;top:459px;left:69px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:401px;left:467px;white-space:nowrap" class="ft35">6.&#160;</p>
								<p style="position:absolute;top:420px;left:467px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:478px;left:69px;white-space:nowrap" class="ft35">2.&#160;&#160;&#160;</p>
								<p style="position:absolute;top:497px;left:69px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:517px;left:69px;white-space:nowrap" class="ft30">&#160;</p>
								<p style="position:absolute;top:478px;left:467px;white-space:nowrap" class="ft35">7.&#160;</p>
								<p style="position:absolute;top:497px;left:467px;white-space:nowrap" class="ft325">&#160;<br />&#160;</p>
								<p style="position:absolute;top:536px;left:467px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:555px;left:69px;white-space:nowrap" class="ft35">3.&#160;&#160;</p>
								<p style="position:absolute;top:575px;left:69px;white-space:nowrap" class="ft325">&#160;<br />&#160;</p>
								<p style="position:absolute;top:613px;left:69px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:555px;left:467px;white-space:nowrap" class="ft35">8.&#160;</p>
								<p style="position:absolute;top:633px;left:69px;white-space:nowrap" class="ft35">4.&#160;&#160;&#160;</p>
								<p style="position:absolute;top:633px;left:123px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:652px;left:69px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:671px;left:69px;white-space:nowrap" class="ft325">&#160;<br />&#160;</p>
								<p style="position:absolute;top:633px;left:467px;white-space:nowrap" class="ft35">9.&#160;</p>
								<p style="position:absolute;top:710px;left:69px;white-space:nowrap" class="ft326">
												5.&#160;&#160;<b>&#160;<br /></b>&#160;</p>
								<p style="position:absolute;top:749px;left:69px;white-space:nowrap" class="ft325">&#160;<br />&#160;</p>
								<p style="position:absolute;top:710px;left:467px;white-space:nowrap" class="ft325">10.&#160;<br />&#160;</p>
								<p style="position:absolute;top:749px;left:467px;white-space:nowrap" class="ft325">&#160;<br />&#160;</p>
								<p style="position:absolute;top:792px;left:108px;white-space:nowrap" class="ft312"><i>&#160;</i></p>
								<p style="position:absolute;top:799px;left:108px;white-space:nowrap" class="ft313"><i>&#160;</i></p>
								<p style="position:absolute;top:807px;left:399px;white-space:nowrap" class="ft36"><b>Verification&#160;</b>
								</p>
								<p style="position:absolute;top:831px;left:68px;white-space:nowrap" class="ft314"><b>I</b></p>
								<p style="position:absolute;top:834px;left:78px;white-space:nowrap" class="ft315">
												.......................................................father</p>
								<p style="position:absolute;top:838px;left:440px;white-space:nowrap" class="ft34"><b>/</b></p>
								<p style="position:absolute;top:836px;left:445px;white-space:nowrap" class="ft37">Husband</p>
								<p style="position:absolute;top:838px;left:514px;white-space:nowrap" class="ft34"><b>&#160;</b></p>
								<p style="position:absolute;top:834px;left:518px;white-space:nowrap" class="ft315">
												......................................................&#160;</p>
								<p style="position:absolute;top:850px;left:68px;white-space:nowrap" class="ft315">
												&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
								</p>
								<p style="position:absolute;top:858px;left:203px;white-space:nowrap" class="ft316"><b>&#160;</b></p>
								<p style="position:absolute;top:943px;left:108px;white-space:nowrap" class="ft35">&#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160;&#160;</p>
								<p style="position:absolute;top:951px;left:174px;white-space:nowrap" class="ft317">&#160;</p>
								<p style="position:absolute;top:960px;left:108px;white-space:nowrap" class="ft34"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160;
																&#160; &#160;&#160;&#160; &#160; &#160;&#160;&#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160;
																&#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160;
																&#160;&#160;</b>&#160;&#160;</p>
								<p style="position:absolute;top:965px;left:108px;white-space:nowrap" class="ft35">&#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160;&#160;</p>
								<p style="position:absolute;top:975px;left:174px;white-space:nowrap" class="ft318">&#160;</p>
								<p style="position:absolute;top:982px;left:41px;white-space:nowrap" class="ft311">&#160; &#160;&#160;&#160;
								</p>
								<p style="position:absolute;top:981px;left:63px;white-space:nowrap" class="ft37">&#160;</p>
								<p style="position:absolute;top:1007px;left:41px;white-space:nowrap" class="ft311">&#160; &#160;
												&#160;&#160;&#160;Place:&#160;<b>Chattogram.&#160;</b></p>
								<p style="position:absolute;top:1007px;left:270px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1007px;left:324px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1007px;left:378px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1007px;left:432px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1007px;left:486px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1007px;left:540px;white-space:nowrap" class="ft33"><b>&#160; &#160;
																&#160;&#160;</b></p>
								<p style="position:absolute;top:1007px;left:594px;white-space:nowrap" class="ft33"><b>&#160; &#160; &#160;
																&#160;Signature&#160;</b>&#160;</p>
								<p style="position:absolute;top:1031px;left:41px;white-space:nowrap" class="ft311">&#160; &#160; &#160;
												&#160;Date……………………..&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160; &#160; &#160;&#160;&#160; &#160;&#160;</p>
								<p style="position:absolute;top:1032px;left:538px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:1058px;left:41px;white-space:nowrap" class="ft33"><b>&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:1058px;left:108px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:162px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:216px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:270px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:324px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:378px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:432px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:486px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1058px;left:540px;white-space:nowrap" class="ft33"><b>&#160;</b></p>
								<p style="position:absolute;top:1055px;left:545px;white-space:nowrap" class="ft315">(</p>
								<p style="position:absolute;top:1053px;left:552px;white-space:nowrap" class="ft36"><b>…………….………………….</b></p>
								<p style="position:absolute;top:1056px;left:780px;white-space:nowrap" class="ft38"><b>)</b></p>
								<p style="position:absolute;top:1070px;left:786px;white-space:nowrap" class="ft319"><b>&#160;</b></p>
								<p style="position:absolute;top:1088px;left:567px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:1085px;left:571px;white-space:nowrap" class="ft320">(Name
												in&#160;block&#160;letters)</p>
								<p style="position:absolute;top:1088px;left:766px;white-space:nowrap" class="ft35">&#160;</p>
								<p style="position:absolute;top:1108px;left:567px;white-space:nowrap" class="ft325">&#160; &#160; &#160;
												&#160;&#160;<br />&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:1180px;left:469px;white-space:nowrap" class="ft319"><b>&#160;</b></p>
								<p style="position:absolute;top:879px;left:69px;white-space:nowrap" class="ft38">
												<b>TIN&#160;&#160;1&#160;&#160;2&#160;&#160;3&#160;&#160;5&#160;&#160;4&#160;&#160;5&#160;&#160;6&#160;&#160;8&#160;&#160;9&#160;&#160;8&#160;&#160;1&#160;&#160;0&#160;</b>
								</p>
								<p style="position:absolute;top:877px;left:452px;white-space:nowrap" class="ft35">
												Solemnly&#160;declare&#160;that&#160;to&#160;the best&#160;of&#160;my&#160;knowledge and&#160;</p>
								<p style="position:absolute;top:894px;left:452px;white-space:nowrap" class="ft321">&#160;</p>
								<p style="position:absolute;top:902px;left:75px;white-space:nowrap" class="ft30">&#160;</p>
								<p style="position:absolute;top:914px;left:75px;white-space:nowrap" class="ft35">belief</p>
								<p style="position:absolute;top:913px;left:113px;white-space:nowrap" class="ft311">
												&#160;&#160;the&#160;&#160;information&#160;&#160;given&#160;&#160;in&#160;&#160;this&#160;&#160;return&#160;&#160;and&#160;&#160;statements&#160;&#160;and&#160;&#160;documents&#160;&#160;annexed&#160;&#160;herewith&#160;&#160;is&#160;&#160;correct&#160;
								</p>
								<p style="position:absolute;top:933px;left:75px;white-space:nowrap" class="ft311">and complete</p>
								<p style="position:absolute;top:934px;left:172px;white-space:nowrap" class="ft35">.&#160;&#160;</p>
				</div>
				{{-- page four --}}
				<div class="card mb-3" id="page4-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target004.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft40">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft41">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft42"><b>&#160;</b></p>
								<p style="position:absolute;top:60px;left:398px;white-space:nowrap" class="ft43"><b>SCHEDULE-1&#160;</b></p>
								<p style="position:absolute;top:85px;left:287px;white-space:nowrap" class="ft44">
												<b>Particulars&#160;of&#160;Income from&#160;Employment&#160;</b>
								</p>
								<p style="position:absolute;top:105px;left:108px;white-space:nowrap" class="ft45"><b>&#160;</b></p>
								<p style="position:absolute;top:115px;left:108px;white-space:nowrap" class="ft46"><b>a)</b></p>
								<p style="position:absolute;top:116px;left:123px;white-space:nowrap" class="ft47"><b>&#160;</b></p>
								<p style="position:absolute;top:114px;left:127px;white-space:nowrap" class="ft48"><b>This part is applicable
																for employees receiving salary&#160;under government&#160;pay&#160;scale.</b></p>
								<p style="position:absolute;top:116px;left:814px;white-space:nowrap" class="ft47"><b>&#160;</b></p>
								<p style="position:absolute;top:133px;left:108px;white-space:nowrap" class="ft49"><b>&#160;</b></p>
								<p style="position:absolute;top:147px;left:55px;white-space:nowrap" class="ft410">Name
												of&#160;the&#160;Taxpayer: &#160;</p>
								<p style="position:absolute;top:139px;left:231px;white-space:nowrap" class="ft43"><b>………………………………..…</b></p>
								<p style="position:absolute;top:148px;left:514px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:144px;left:536px;white-space:nowrap" class="ft412">TIN</p>
								<p style="position:absolute;top:147px;left:571px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:145px;left:591px;white-space:nowrap" class="ft413">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:171px;left:469px;white-space:nowrap" class="ft414"><b>&#160;</b></p>
								<p style="position:absolute;top:179px;left:108px;white-space:nowrap" class="ft415"><b>&#160;</b></p>
								<p style="position:absolute;top:185px;left:227px;white-space:nowrap" class="ft42"><b>Particulars&#160;</b>
								</p>
								<p style="position:absolute;top:185px;left:502px;white-space:nowrap" class="ft42">
												<b>Amount&#160;of&#160;</b>
								</p>
								<p style="position:absolute;top:202px;left:488px;white-space:nowrap" class="ft42">
												<b>Income&#160;&#160;(Taka)&#160;</b>
								</p>
								<p style="position:absolute;top:185px;left:609px;white-space:nowrap" class="ft42">
												<b>Exempted&#160;Amount&#160;</b>
								</p>
								<p style="position:absolute;top:202px;left:648px;white-space:nowrap" class="ft42"><b>(&#160;Taka)&#160;</b>
								</p>
								<p style="position:absolute;top:185px;left:760px;white-space:nowrap" class="ft42">
												<b>Net&#160;taxable&#160;</b>
								</p>
								<p style="position:absolute;top:202px;left:751px;white-space:nowrap" class="ft42">
												<b>Income&#160;(Tk.)&#160;</b>
								</p>
								<p style="position:absolute;top:221px;left:62px;white-space:nowrap" class="ft410">1. Basic pay&#160;</p>
								<p style="position:absolute;top:220px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:220px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:220px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:249px;left:62px;white-space:nowrap" class="ft410">2. Arrear
												Pay&#160;(if&#160;not included in taxable income earlier)&#160;</p>
								<p style="position:absolute;top:248px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:248px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:248px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:276px;left:62px;white-space:nowrap" class="ft410">3. Special allowance&#160;
								</p>
								<p style="position:absolute;top:276px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:276px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:276px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:304px;left:62px;white-space:nowrap" class="ft410">4. House&#160;Rent
												allowance&#160;&#160;</p>
								<p style="position:absolute;top:303px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:303px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:303px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:332px;left:62px;white-space:nowrap" class="ft410">5. Medical allowance&#160;
								</p>
								<p style="position:absolute;top:331px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:331px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:331px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:359px;left:62px;white-space:nowrap" class="ft410">6.
												Conveyance&#160;allowance&#160;</p>
								<p style="position:absolute;top:359px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:359px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:359px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:387px;left:62px;white-space:nowrap" class="ft410">7. Festival allowance&#160;
								</p>
								<p style="position:absolute;top:386px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:386px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:386px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:415px;left:62px;white-space:nowrap" class="ft410">8.&#160;Support Staff
												allowance&#160;</p>
								<p style="position:absolute;top:414px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:414px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:414px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:442px;left:62px;white-space:nowrap" class="ft410">
												9.&#160;Leave&#160;allowance&#160;</p>
								<p style="position:absolute;top:442px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:442px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:442px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:470px;left:62px;white-space:nowrap" class="ft410">10. Honorarium
												/&#160;Reward&#160;</p>
								<p style="position:absolute;top:469px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:469px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:469px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:498px;left:62px;white-space:nowrap" class="ft410">11. Overtime
												allowances&#160;&#160;</p>
								<p style="position:absolute;top:497px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:497px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:497px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:525px;left:62px;white-space:nowrap" class="ft410">12. Bangla&#160;Noboborsho
												allowances&#160;</p>
								<p style="position:absolute;top:525px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:525px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:525px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:553px;left:62px;white-space:nowrap" class="ft410">13.&#160;Interest accrued
												on Provident Fund&#160;</p>
								<p style="position:absolute;top:552px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:552px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:552px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:581px;left:62px;white-space:nowrap" class="ft410">14.&#160;Lump Grant&#160;
								</p>
								<p style="position:absolute;top:580px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:580px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:580px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:608px;left:62px;white-space:nowrap" class="ft410">15. Gratuity&#160;</p>
								<p style="position:absolute;top:608px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:608px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:608px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:636px;left:62px;white-space:nowrap" class="ft410">16. Others,
												if&#160;any&#160;(provide&#160;detail)&#160;</p>
								<p style="position:absolute;top:635px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:635px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:635px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:664px;left:62px;white-space:nowrap" class="ft410">17. Total&#160;&#160;</p>
								<p style="position:absolute;top:663px;left:481px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:663px;left:609px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:663px;left:751px;white-space:nowrap" class="ft411">&#160;</p>
								<p style="position:absolute;top:689px;left:108px;white-space:nowrap" class="ft49"><b>&#160;</b></p>
								<p style="position:absolute;top:698px;left:54px;white-space:nowrap" class="ft46"><b>b)This part is
																applicable&#160;for&#160;employees other&#160;than&#160;employees receiving salary
																under&#160;government</b></p>
								<p style="position:absolute;top:699px;left:794px;white-space:nowrap" class="ft47"><b>&#160;pay
																scale&#160;</b></p>
								<p style="position:absolute;top:716px;left:469px;white-space:nowrap" class="ft416"><b>&#160;</b></p>
								<p style="position:absolute;top:723px;left:469px;white-space:nowrap" class="ft415"><b>&#160;</b></p>
								<p style="position:absolute;top:731px;left:69px;white-space:nowrap" class="ft417">&#160; &#160; &#160;
												&#160; &#160;Particulars&#160;</p>
								<p style="position:absolute;top:731px;left:577px;white-space:nowrap" class="ft417">Income(Taka)</p>
								<p style="position:absolute;top:730px;left:687px;white-space:nowrap" class="ft412">&#160;</p>
								<p style="position:absolute;top:731px;left:725px;white-space:nowrap" class="ft417">Income(Taka)</p>
								<p style="position:absolute;top:730px;left:836px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:761px;left:76px;white-space:nowrap" class="ft411">1.&#160;</p>
								<p style="position:absolute;top:760px;left:103px;white-space:nowrap" class="ft46"><b>&#160;</b>Basic
												pay&#160;</p>
								<p style="position:absolute;top:761px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:761px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:793px;left:76px;white-space:nowrap" class="ft411">2.&#160;</p>
								<p style="position:absolute;top:792px;left:103px;white-space:nowrap" class="ft410">&#160;Allowances&#160;
								</p>
								<p style="position:absolute;top:791px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:791px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:821px;left:76px;white-space:nowrap" class="ft411">3.&#160;</p>
								<p style="position:absolute;top:820px;left:103px;white-space:nowrap" class="ft410">&#160;Advance&#160;/
												Arrear Salary&#160;</p>
								<p style="position:absolute;top:819px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:819px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:850px;left:76px;white-space:nowrap" class="ft411">4.&#160;</p>
								<p style="position:absolute;top:849px;left:103px;white-space:nowrap" class="ft410">
												&#160;&#160;Gratuity,&#160;Annuity, Pension or&#160;similar benefit&#160;</p>
								<p style="position:absolute;top:846px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:846px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:877px;left:76px;white-space:nowrap" class="ft411">5.&#160;</p>
								<p style="position:absolute;top:876px;left:103px;white-space:nowrap" class="ft410">
												&#160;&#160;Perquisites&#160;</p>
								<p style="position:absolute;top:875px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:875px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:906px;left:76px;white-space:nowrap" class="ft411">6.&#160;</p>
								<p style="position:absolute;top:905px;left:103px;white-space:nowrap" class="ft410">&#160;Receipt&#160;in
												lieu of&#160;or in addition to Salary&#160;or Wages&#160;</p>
								<p style="position:absolute;top:903px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:903px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:934px;left:76px;white-space:nowrap" class="ft411">7.&#160;</p>
								<p style="position:absolute;top:933px;left:103px;white-space:nowrap" class="ft410">&#160;&#160;Income from
												Employee’s Share&#160;Scheme&#160;</p>
								<p style="position:absolute;top:931px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:931px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:962px;left:76px;white-space:nowrap" class="ft411">8.&#160;</p>
								<p style="position:absolute;top:961px;left:103px;white-space:nowrap" class="ft410">&#160;Accommodation
												Facility&#160;&#160;</p>
								<p style="position:absolute;top:959px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:959px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:990px;left:76px;white-space:nowrap" class="ft411">9.&#160;</p>
								<p style="position:absolute;top:989px;left:103px;white-space:nowrap" class="ft410">&#160;Transport
												Facility&#160;</p>
								<p style="position:absolute;top:987px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:987px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1018px;left:76px;white-space:nowrap" class="ft411">10.&#160;</p>
								<p style="position:absolute;top:1017px;left:103px;white-space:nowrap" class="ft410">
												&#160;&#160;Any&#160;other Facility&#160;provided by&#160;Employer&#160;</p>
								<p style="position:absolute;top:1015px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1015px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1046px;left:76px;white-space:nowrap" class="ft411">11.&#160;</p>
								<p style="position:absolute;top:1045px;left:103px;white-space:nowrap" class="ft410">&#160;Employer’s
												Contribution to Recognized Provident&#160;Fund&#160;</p>
								<p style="position:absolute;top:1043px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1043px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1074px;left:76px;white-space:nowrap" class="ft411">12.&#160;</p>
								<p style="position:absolute;top:1073px;left:103px;white-space:nowrap" class="ft410">&#160;Others,
												if&#160;any&#160;(provide&#160;detail)&#160;</p>
								<p style="position:absolute;top:1071px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1071px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1102px;left:76px;white-space:nowrap" class="ft411">13.&#160;</p>
								<p style="position:absolute;top:1101px;left:103px;white-space:nowrap" class="ft410">&#160;Total
												Salary&#160;Received (aggregate of 1 to 12)&#160;</p>
								<p style="position:absolute;top:1099px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1099px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1130px;left:76px;white-space:nowrap" class="ft411">14.&#160;</p>
								<p style="position:absolute;top:1129px;left:103px;white-space:nowrap" class="ft410">&#160;Exempted Amount
												(as per Part 1 of 6</p>
								<p style="position:absolute;top:1123px;left:373px;white-space:nowrap" class="ft418">th</p>
								<p style="position:absolute;top:1126px;left:382px;white-space:nowrap" class="ft410">&#160;Schedule)&#160;
								</p>
								<p style="position:absolute;top:1127px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1127px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1163px;left:76px;white-space:nowrap" class="ft411">15.&#160;</p>
								<p style="position:absolute;top:1161px;left:103px;white-space:nowrap" class="ft417">&#160;<b>Total income
																from salary&#160;(13-14)&#160;</b></p>
								<p style="position:absolute;top:1155px;left:687px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1155px;left:840px;white-space:nowrap" class="ft44"><b>&#160;</b></p>
								<p style="position:absolute;top:1188px;left:469px;white-space:nowrap" class="ft421">
												<i>&#160;<br />&#160;<br />&#160;<br />&#160;<br />&#160;<br />&#160;</i>
								</p>
								<p style="position:absolute;top:1216px;left:444px;white-space:nowrap" class="ft420"><b>&#160; &#160;&#160;
																&#160; &#160; &#160; &#160;4&#160;</b></p>
				</div>
				{{-- page five --}}
				<div class="card mb-3" id="page5-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target005.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft50">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft51">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft52"><b>&#160;</b></p>
								<p style="position:absolute;top:60px;left:398px;white-space:nowrap" class="ft53"><b>SCHEDULE-2&#160;</b>
								</p>
								<p style="position:absolute;top:85px;left:327px;white-space:nowrap" class="ft54"><b>(Particulars of Income
																from&#160;Rent)&#160;</b></p>
								<p style="position:absolute;top:103px;left:469px;white-space:nowrap" class="ft55">&#160;</p>
								<p style="position:absolute;top:101px;left:469px;white-space:nowrap" class="ft56"><b>&#160;</b></p>
								<p style="position:absolute;top:106px;left:473px;white-space:nowrap" class="ft57"><b>&#160;</b></p>
								<p style="position:absolute;top:117px;left:469px;white-space:nowrap" class="ft58"><b>&#160;</b></p>
								<p style="position:absolute;top:137px;left:55px;white-space:nowrap" class="ft59">Name
												of&#160;the&#160;Assessee: &#160;</p>
								<p style="position:absolute;top:129px;left:228px;white-space:nowrap" class="ft53"><b>………………………………..…</b>
								</p>
								<p style="position:absolute;top:138px;left:511px;white-space:nowrap" class="ft510">&#160;</p>
								<p style="position:absolute;top:134px;left:536px;white-space:nowrap" class="ft511">TIN</p>
								<p style="position:absolute;top:137px;left:571px;white-space:nowrap" class="ft510">&#160;</p>
								<p style="position:absolute;top:135px;left:591px;white-space:nowrap" class="ft512">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:160px;left:108px;white-space:nowrap" class="ft513"><i>&#160;</i></p>
								<p style="position:absolute;top:171px;left:469px;white-space:nowrap" class="ft56"><b>&#160;</b></p>
								<p style="position:absolute;top:191px;left:82px;white-space:nowrap" class="ft514"><b>Property
																location,&#160;</b></p>
								<p style="position:absolute;top:212px;left:77px;white-space:nowrap" class="ft514"><b>details
																and&#160;share&#160;of&#160;</b></p>
								<p style="position:absolute;top:232px;left:112px;white-space:nowrap" class="ft514"><b>ownership</b></p>
								<p style="position:absolute;top:231px;left:192px;white-space:nowrap" class="ft54"><b>&#160;</b></p>
								<p style="position:absolute;top:192px;left:251px;white-space:nowrap" class="ft54"><b>&#160;
																&#160;&#160;Calculation of&#160;total&#160;rent&#160;</b></p>
								<p style="position:absolute;top:191px;left:587px;white-space:nowrap" class="ft514"><b>Amount
																of&#160;Tk.&#160;</b></p>
								<p style="position:absolute;top:191px;left:729px;white-space:nowrap" class="ft514"><b>Amount
																of&#160;Tk.&#160;</b></p>
								<p style="position:absolute;top:255px;left:103px;white-space:nowrap" class="ft54"><b>&#160;</b></p>
								<p style="position:absolute;top:254px;left:251px;white-space:nowrap" class="ft524">1)&#160;. Rent
												Received&#160;or&#160;Annual Value&#160;<br />(whichever is higher)&#160;</p>
								<p style="position:absolute;top:255px;left:701px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:255px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:301px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:301px;left:251px;white-space:nowrap" class="ft515">2)
												Advance&#160;Rent&#160;Received&#160;</p>
								<p style="position:absolute;top:301px;left:701px;white-space:nowrap" class="ft516"><b>&#160;&#160;</b></p>
								<p style="position:absolute;top:301px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:337px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:326px;left:251px;white-space:nowrap" class="ft524">3)&#160;Value
												of&#160;any&#160;Benefit&#160;in addition to 1&#160;<br />&amp; 2&#160;</p>
								<p style="position:absolute;top:326px;left:701px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:326px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:373px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:373px;left:251px;white-space:nowrap" class="ft515">4)
												Adjusted&#160;Advance&#160;Rent&#160;</p>
								<p style="position:absolute;top:372px;left:701px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:372px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:402px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:402px;left:251px;white-space:nowrap" class="ft515">5)
												Vacancy&#160;Allowance&#160;</p>
								<p style="position:absolute;top:400px;left:701px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:400px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:431px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:431px;left:251px;white-space:nowrap" class="ft515">6)
												Total&#160;Rental&#160;Value (1+2+3-4-5)&#160;</p>
								<p style="position:absolute;top:429px;left:842px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:460px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:460px;left:251px;white-space:nowrap" class="ft515">7) Allowable
												Deduction:&#160;</p>
								<p style="position:absolute;top:460px;left:575px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:460px;left:751px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:488px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:486px;left:251px;white-space:nowrap" class="ft515">(a)
												Repair,&#160;Collection,&#160;etc.&#160;</p>
								<p style="position:absolute;top:486px;left:575px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:488px;left:751px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:515px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:513px;left:251px;white-space:nowrap" class="ft515">(b) Municipal or
												Local&#160;Tax&#160;</p>
								<p style="position:absolute;top:513px;left:575px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:515px;left:751px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:543px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:541px;left:251px;white-space:nowrap" class="ft515">(c) Land Revenue&#160;
								</p>
								<p style="position:absolute;top:541px;left:575px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:543px;left:751px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:580px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:568px;left:251px;white-space:nowrap" class="ft524">(d) Interest&#160;on
												Loan/Mortgage/&#160;<br />&#160; &#160;&#160;Capital&#160;Charge&#160;</p>
								<p style="position:absolute;top:568px;left:575px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:580px;left:751px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:616px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:614px;left:251px;white-space:nowrap" class="ft515">(e)
												Insurance&#160;Premium&#160;paid&#160;</p>
								<p style="position:absolute;top:614px;left:575px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:616px;left:751px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:644px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:642px;left:251px;white-space:nowrap" class="ft515">(f) Other,
												if&#160;any&#160;</p>
								<p style="position:absolute;top:642px;left:575px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:644px;left:751px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:673px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:673px;left:251px;white-space:nowrap" class="ft515">8) Total&#160;Admissible
												Deduction&#160;</p>
								<p style="position:absolute;top:670px;left:842px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:703px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:703px;left:251px;white-space:nowrap" class="ft515">9) Net&#160;Income (
												6-8)&#160;</p>
								<p style="position:absolute;top:701px;left:842px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:734px;left:103px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:734px;left:251px;white-space:nowrap" class="ft515">10)&#160;Taxpayer’s
												Share,&#160;(if&#160;applicable)&#160;</p>
								<p style="position:absolute;top:731px;left:842px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:759px;left:108px;white-space:nowrap" class="ft525">
												<i>&#160;<br />&#160;</i>
								</p>
								<p style="position:absolute;top:799px;left:398px;white-space:nowrap" class="ft53"><b>SCHEDULE-3&#160;</b>
								</p>
								<p style="position:absolute;top:825px;left:298px;white-space:nowrap" class="ft54"><b>(Particulars of
																Income from&#160;Agriculture)&#160;</b></p>
								<p style="position:absolute;top:850px;left:469px;white-space:nowrap" class="ft518"><b>&#160;</b></p>
								<p style="position:absolute;top:851px;left:469px;white-space:nowrap" class="ft56"><b>&#160;</b></p>
								<p style="position:absolute;top:856px;left:473px;white-space:nowrap" class="ft57"><b>&#160;</b></p>
								<p style="position:absolute;top:865px;left:469px;white-space:nowrap" class="ft519"><b>&#160;</b></p>
								<p style="position:absolute;top:874px;left:55px;white-space:nowrap" class="ft59">Name
												of&#160;the&#160;Assessee: &#160;</p>
								<p style="position:absolute;top:867px;left:228px;white-space:nowrap" class="ft53"><b>………………………………..…</b>
								</p>
								<p style="position:absolute;top:875px;left:511px;white-space:nowrap" class="ft510">&#160;</p>
								<p style="position:absolute;top:872px;left:536px;white-space:nowrap" class="ft511">TIN</p>
								<p style="position:absolute;top:875px;left:571px;white-space:nowrap" class="ft510">&#160;</p>
								<p style="position:absolute;top:873px;left:591px;white-space:nowrap" class="ft512">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:896px;left:55px;white-space:nowrap" class="ft55">&#160;</p>
								<p style="position:absolute;top:902px;left:55px;white-space:nowrap" class="ft514">
												<b>Nature&#160;of&#160;Agriculture</b>:…………………….…………………..&#160;
								</p>
								<p style="position:absolute;top:901px;left:554px;white-space:nowrap" class="ft511">&#160;</p>
								<p style="position:absolute;top:925px;left:108px;white-space:nowrap" class="ft526">
												<i>&#160;<br />&#160;</i>
								</p>
								<p style="position:absolute;top:937px;left:71px;white-space:nowrap" class="ft56"><b>Serial&#160;</b></p>
								<p style="position:absolute;top:956px;left:81px;white-space:nowrap" class="ft56"><b>No&#160;</b></p>
								<p style="position:absolute;top:938px;left:331px;white-space:nowrap" class="ft54"><b>Summary&#160;of
																income</b></p>
								<p style="position:absolute;top:940px;left:499px;white-space:nowrap" class="ft56"><b>&#160;</b></p>
								<p style="position:absolute;top:937px;left:724px;white-space:nowrap" class="ft56"><b>Amount&#160;in
																taka&#160;</b></p>
								<p style="position:absolute;top:979px;left:81px;white-space:nowrap" class="ft510">1.&#160;</p>
								<p style="position:absolute;top:977px;left:108px;white-space:nowrap" class="ft54"><b>&#160;&#160;</b>Sales
												/ Turnover/&#160;Receipt&#160;</p>
								<p style="position:absolute;top:977px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:1016px;left:81px;white-space:nowrap" class="ft510">2.&#160;</p>
								<p style="position:absolute;top:1014px;left:108px;white-space:nowrap" class="ft515">
												&#160;&#160;Gross&#160;Profit&#160;</p>
								<p style="position:absolute;top:1012px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:1054px;left:81px;white-space:nowrap" class="ft510">3.&#160;</p>
								<p style="position:absolute;top:1052px;left:108px;white-space:nowrap" class="ft515">&#160;</p>
								<p style="position:absolute;top:1041px;left:130px;white-space:nowrap" class="ft524">
												General&#160;Expenses,&#160;Cost Of&#160;Goods Sold,&#160;Land&#160;Development
												Tax,&#160;Land&#160;<br />Tax, Interest&#160;On Loan,&#160;Insurance Premium And Other Expenses&#160;</p>
								<p style="position:absolute;top:1041px;left:843px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:1095px;left:81px;white-space:nowrap" class="ft510">4.&#160;</p>
								<p style="position:absolute;top:1093px;left:108px;white-space:nowrap" class="ft515">
												&#160;&#160;<b>Net&#160;Income (2-3)&#160;</b></p>
								<p style="position:absolute;top:1088px;left:780px;white-space:nowrap" class="ft516"><b>&#160;</b></p>
								<p style="position:absolute;top:1122px;left:108px;white-space:nowrap" class="ft527">
												<i>&#160;<br />&#160;<br />&#160;<br />&#160;</i>
								</p>
								<p style="position:absolute;top:1195px;left:108px;white-space:nowrap" class="ft521"><i>&#160;</i></p>
								<p style="position:absolute;top:264px;left:72px;white-space:nowrap" class="ft51">&#160;</p>
								<p style="position:absolute;top:1190px;left:453px;white-space:nowrap" class="ft522">&#160;5</p>
								<p style="position:absolute;top:1196px;left:469px;white-space:nowrap" class="ft523">&#160;</p>
				</div>
				{{-- Page six --}}
				<div class="card mb-3" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target006.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft60">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft61">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft62"><b>&#160;</b></p>
								<p style="position:absolute;top:60px;left:398px;white-space:nowrap" class="ft63"><b>SCHEDULE-4&#160;</b>
								</p>
								<p style="position:absolute;top:85px;left:311px;white-space:nowrap" class="ft64"><b>(Particulars of Income
																from&#160;Business)&#160;</b></p>
								<p style="position:absolute;top:109px;left:469px;white-space:nowrap" class="ft65"><b>&#160;</b></p>
								<p style="position:absolute;top:119px;left:55px;white-space:nowrap" class="ft66">Name
												of&#160;the&#160;Taxpayer: &#160;</p>
								<p style="position:absolute;top:112px;left:231px;white-space:nowrap" class="ft63"><b>………………………………..…</b>
								</p>
								<p style="position:absolute;top:120px;left:514px;white-space:nowrap" class="ft67">&#160;</p>
								<p style="position:absolute;top:116px;left:535px;white-space:nowrap" class="ft68">TIN</p>
								<p style="position:absolute;top:119px;left:570px;white-space:nowrap" class="ft67">&#160;</p>
								<p style="position:absolute;top:117px;left:589px;white-space:nowrap" class="ft69">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:140px;left:55px;white-space:nowrap" class="ft65"><b>&#160;</b></p>
								<p style="position:absolute;top:146px;left:55px;white-space:nowrap" class="ft66">Name
												of&#160;Business……………………….…………………….</p>
								<p style="position:absolute;top:148px;left:501px;white-space:nowrap" class="ft61">&#160; &#160;</p>
								<p style="position:absolute;top:146px;left:513px;white-space:nowrap" class="ft66">&#160; &#160;&#160;
												&#160;Nature&#160;of&#160;Business……:………….…&#160;</p>
								<p style="position:absolute;top:165px;left:55px;white-space:nowrap" class="ft610">&#160;</p>
								<p style="position:absolute;top:167px;left:55px;white-space:nowrap" class="ft66">Address
												of&#160;Business…………………………………………….&#160;</p>
								<p style="position:absolute;top:189px;left:108px;white-space:nowrap" class="ft611"><i>&#160;</i></p>
								<p style="position:absolute;top:192px;left:108px;white-space:nowrap" class="ft612"><i>&#160;</i></p>
								<p style="position:absolute;top:200px;left:71px;white-space:nowrap" class="ft613"><b>Serial&#160;</b></p>
								<p style="position:absolute;top:219px;left:81px;white-space:nowrap" class="ft613"><b>No&#160;</b></p>
								<p style="position:absolute;top:202px;left:283px;white-space:nowrap" class="ft69">
												<b>Summary&#160;of&#160;Income</b>
								</p>
								<p style="position:absolute;top:207px;left:493px;white-space:nowrap" class="ft613"><b>&#160;</b></p>
								<p style="position:absolute;top:201px;left:679px;white-space:nowrap" class="ft614"><b>Amount in Taka</b>
								</p>
								<p style="position:absolute;top:204px;left:827px;white-space:nowrap" class="ft613"><b>&#160;</b></p>
								<p style="position:absolute;top:240px;left:81px;white-space:nowrap" class="ft67">1.&#160;</p>
								<p style="position:absolute;top:239px;left:108px;white-space:nowrap" class="ft615"><b>&#160;</b></p>
								<p style="position:absolute;top:239px;left:130px;white-space:nowrap" class="ft616">Sales /
												Turnover/&#160;Receipt&#160;</p>
								<p style="position:absolute;top:240px;left:843px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:267px;left:81px;white-space:nowrap" class="ft67">2.&#160;</p>
								<p style="position:absolute;top:266px;left:108px;white-space:nowrap" class="ft66">&#160;</p>
								<p style="position:absolute;top:265px;left:130px;white-space:nowrap" class="ft616">Gross Profit&#160;</p>
								<p style="position:absolute;top:265px;left:843px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:292px;left:81px;white-space:nowrap" class="ft67">3.&#160;</p>
								<p style="position:absolute;top:291px;left:108px;white-space:nowrap" class="ft66">&#160;</p>
								<p style="position:absolute;top:291px;left:130px;white-space:nowrap" class="ft616">General, Cost
												Of&#160;Goods Sold And Other&#160;Expenses&#160;</p>
								<p style="position:absolute;top:291px;left:843px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:317px;left:81px;white-space:nowrap" class="ft67">4.&#160;</p>
								<p style="position:absolute;top:316px;left:108px;white-space:nowrap" class="ft66">&#160;</p>
								<p style="position:absolute;top:316px;left:130px;white-space:nowrap" class="ft616">Bad Debts&#160;</p>
								<p style="position:absolute;top:316px;left:843px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:343px;left:81px;white-space:nowrap" class="ft67">5.&#160;</p>
								<p style="position:absolute;top:342px;left:108px;white-space:nowrap" class="ft66">&#160;</p>
								<p style="position:absolute;top:342px;left:130px;white-space:nowrap" class="ft64"><b>Net&#160;Profit
																(02-03)&#160;</b></p>
								<p style="position:absolute;top:341px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:674px;left:108px;white-space:nowrap" class="ft617"><i>&#160;</i></p>
								<p style="position:absolute;top:687px;left:108px;white-space:nowrap" class="ft618"><i>&#160;</i></p>
								<p style="position:absolute;top:696px;left:412px;white-space:nowrap" class="ft615"><b>SCHEDULE-5&#160;</b>
								</p>
								<p style="position:absolute;top:716px;left:333px;white-space:nowrap" class="ft613"><b>(Particulars
																of&#160;Investment&#160;Tax&#160;Credit)&#160;</b></p>
								<p style="position:absolute;top:737px;left:469px;white-space:nowrap" class="ft65"><b>&#160;</b></p>
								<p style="position:absolute;top:728px;left:469px;white-space:nowrap" class="ft613"><b>&#160;</b></p>
								<p style="position:absolute;top:739px;left:473px;white-space:nowrap" class="ft65"><b>&#160;</b></p>
								<p style="position:absolute;top:740px;left:469px;white-space:nowrap" class="ft65"><b>&#160;</b></p>
								<p style="position:absolute;top:750px;left:55px;white-space:nowrap" class="ft66">Name
												of&#160;the&#160;Assessee: &#160;</p>
								<p style="position:absolute;top:743px;left:228px;white-space:nowrap" class="ft63"><b>………………………………..…</b>
								</p>
								<p style="position:absolute;top:751px;left:511px;white-space:nowrap" class="ft67">&#160;</p>
								<p style="position:absolute;top:747px;left:540px;white-space:nowrap" class="ft68">TIN</p>
								<p style="position:absolute;top:750px;left:575px;white-space:nowrap" class="ft67">&#160;</p>
								<p style="position:absolute;top:749px;left:595px;white-space:nowrap" class="ft69">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:773px;left:55px;white-space:nowrap" class="ft610">&#160;</p>
								<p style="position:absolute;top:783px;left:69px;white-space:nowrap" class="ft615"><b>Particulars
																of&#160;Rebate&#160;able&#160;Investment</b></p>
								<p style="position:absolute;top:781px;left:360px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:806px;left:81px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:806px;left:300px;white-space:nowrap" class="ft64"><b>Summary&#160;of
																Income</b></p>
								<p style="position:absolute;top:807px;left:470px;white-space:nowrap" class="ft66">&#160;</p>
								<p style="position:absolute;top:806px;left:684px;white-space:nowrap" class="ft64"><b>Amount in
																Taka&#160;</b></p>
								<p style="position:absolute;top:838px;left:76px;white-space:nowrap" class="ft67">1.&#160;</p>
								<p style="position:absolute;top:836px;left:103px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:835px;left:103px;white-space:nowrap" class="ft66">
												Life&#160;Insurance&#160;Premium or Contractual Deferred&#160;Annuity&#160;Paid in Bangladesh&#160;&#160;
								</p>
								<p style="position:absolute;top:836px;left:822px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:868px;left:76px;white-space:nowrap" class="ft67">2.&#160;</p>
								<p style="position:absolute;top:866px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:863px;left:103px;white-space:nowrap" class="ft66">Contribution to
												Deposit&#160;Pension&#160;Scheme&#160;</p>
								<p style="position:absolute;top:864px;left:822px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:909px;left:76px;white-space:nowrap" class="ft67">3.&#160;</p>
								<p style="position:absolute;top:907px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:891px;left:103px;white-space:nowrap" class="ft66">Investment in Government
												Securities, Unit Certificate, Mutual Fund,&#160;ETF&#160;or&#160;</p>
								<p style="position:absolute;top:918px;left:103px;white-space:nowrap" class="ft66">Joint&#160;Investment
												Scheme&#160;Unit Certificate&#160;</p>
								<p style="position:absolute;top:892px;left:822px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:951px;left:76px;white-space:nowrap" class="ft67">4.&#160;</p>
								<p style="position:absolute;top:949px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:946px;left:103px;white-space:nowrap" class="ft66">Investment in Securities
												listed with Approved Stock Exchange&#160;</p>
								<p style="position:absolute;top:947px;left:822px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:979px;left:76px;white-space:nowrap" class="ft67">5.&#160;</p>
								<p style="position:absolute;top:977px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:974px;left:103px;white-space:nowrap" class="ft66">Contribution to
												Provident Fund to which Provident Fund Act, 1925 applies&#160;</p>
								<p style="position:absolute;top:975px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1007px;left:76px;white-space:nowrap" class="ft67">6.&#160;</p>
								<p style="position:absolute;top:1005px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:999px;left:103px;white-space:nowrap" class="ft66">Self
												&amp;&#160;Employer’s Contribution to Recognized Provident Fund&#160;</p>
								<p style="position:absolute;top:1003px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1035px;left:76px;white-space:nowrap" class="ft67">7.&#160;</p>
								<p style="position:absolute;top:1033px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:1030px;left:103px;white-space:nowrap" class="ft66">Contribution to Super
												Annuation Fund&#160;</p>
								<p style="position:absolute;top:1031px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1063px;left:76px;white-space:nowrap" class="ft67">8.&#160;</p>
								<p style="position:absolute;top:1061px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:1058px;left:103px;white-space:nowrap" class="ft66">Contribution to
												Benevolent Fund / Group&#160;Insurance&#160;Premium&#160;</p>
								<p style="position:absolute;top:1059px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1091px;left:76px;white-space:nowrap" class="ft67">9.&#160;</p>
								<p style="position:absolute;top:1089px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:1086px;left:103px;white-space:nowrap" class="ft66">Contribution to Zakat
												Fund&#160;</p>
								<p style="position:absolute;top:1087px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1119px;left:76px;white-space:nowrap" class="ft67">10.&#160;</p>
								<p style="position:absolute;top:1117px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:1114px;left:103px;white-space:nowrap" class="ft66">Others,
												if&#160;any&#160;(provide&#160;detail)&#160;</p>
								<p style="position:absolute;top:1115px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1147px;left:76px;white-space:nowrap" class="ft67">11.&#160;</p>
								<p style="position:absolute;top:1145px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:1143px;left:103px;white-space:nowrap" class="ft66">Total&#160;Investment
												(aggregate of&#160;1 to 10)&#160;</p>
								<p style="position:absolute;top:1144px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1175px;left:76px;white-space:nowrap" class="ft67">12.&#160;</p>
								<p style="position:absolute;top:1173px;left:103px;white-space:nowrap" class="ft616">&#160;</p>
								<p style="position:absolute;top:1170px;left:103px;white-space:nowrap" class="ft66">Amount of
												Tax&#160;Rebate&#160;</p>
								<p style="position:absolute;top:1171px;left:753px;white-space:nowrap" class="ft614"><b>&#160;</b></p>
								<p style="position:absolute;top:1195px;left:108px;white-space:nowrap" class="ft611"><i>&#160;</i></p>
								<p style="position:absolute;top:380px;left:92px;white-space:nowrap" class="ft69"><b>&#160;</b></p>
								<p style="position:absolute;top:380px;left:131px;white-space:nowrap" class="ft69">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Summary&#160;of
																Balance Sheet&#160;</b>
								</p>
								<p style="position:absolute;top:380px;left:669px;white-space:nowrap" class="ft69">
												<b>Amount&#160;in&#160;Taka&#160;</b>
								</p>
								<p style="position:absolute;top:407px;left:82px;white-space:nowrap" class="ft616">
												6.&#160;&#160;&#160;&#160;Cash and&#160;Bank Balance&#160;</p>
								<p style="position:absolute;top:408px;left:844px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:431px;left:82px;white-space:nowrap" class="ft616">
												7.&#160;&#160;&#160;&#160;Inventory&#160;&#160;</p>
								<p style="position:absolute;top:431px;left:844px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:454px;left:82px;white-space:nowrap" class="ft616">
												8.&#160;&#160;&#160;&#160;Fixed Assets&#160;</p>
								<p style="position:absolute;top:455px;left:844px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:478px;left:82px;white-space:nowrap" class="ft616">
												9.&#160;&#160;&#160;&#160;Other Assets&#160;</p>
								<p style="position:absolute;top:478px;left:844px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:505px;left:82px;white-space:nowrap" class="ft64">
												<b>10.&#160;&#160;&#160;Total Assets (6+7+8+9)&#160;</b>
								</p>
								<p style="position:absolute;top:505px;left:754px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:528px;left:82px;white-space:nowrap" class="ft616">
												11.&#160;&#160;&#160;Opening Capital&#160;</p>
								<p style="position:absolute;top:528px;left:754px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:557px;left:82px;white-space:nowrap" class="ft616">12.&#160;&#160;&#160;Net
												Profit&#160;</p>
								<p style="position:absolute;top:557px;left:754px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:580px;left:82px;white-space:nowrap" class="ft616">
												13.&#160;&#160;&#160;Drawing during the&#160;Income Year&#160;</p>
								<p style="position:absolute;top:581px;left:754px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:604px;left:82px;white-space:nowrap" class="ft616">
												14.&#160;&#160;&#160;Closing Capital (11+12-13)&#160;</p>
								<p style="position:absolute;top:604px;left:754px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:627px;left:82px;white-space:nowrap" class="ft616">
												15.&#160;&#160;&#160;Liabilities&#160;</p>
								<p style="position:absolute;top:628px;left:754px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:652px;left:82px;white-space:nowrap" class="ft64">
												<b>16.&#160;&#160;&#160;Total Capital &amp;&#160;Liabilities (14+15)&#160;</b>
								</p>
								<p style="position:absolute;top:652px;left:754px;white-space:nowrap" class="ft64"><b>&#160;</b></p>
								<p style="position:absolute;top:1221px;left:454px;white-space:nowrap" class="ft619">6&#160;</p>
				</div>
				{{-- Page Seven --}}
				<div class="card mb-3" id="page7-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target007.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft70">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft71">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft72"><b>&#160;</b></p>
								<p style="position:absolute;top:59px;left:108px;white-space:nowrap" class="ft73"><i><b>&#160;</b></i></p>
								<p style="position:absolute;top:80px;left:108px;white-space:nowrap" class="ft74"><i><b>&#160;</b></i></p>
								<p style="position:absolute;top:100px;left:469px;white-space:nowrap" class="ft728">
												<b>&#160;<br />&#160;</b>
								</p>
								<p style="position:absolute;top:143px;left:247px;white-space:nowrap" class="ft76">
												<b>Statement&#160;of&#160;Expenses&#160;Relating&#160;to&#160;Lifestyle&#160;</b>
								</p>
								<p style="position:absolute;top:169px;left:388px;white-space:nowrap" class="ft77">(For Natural
												Person)&#160;</p>
								<p style="position:absolute;top:191px;left:496px;white-space:nowrap" class="ft78">&#160;</p>
								<p style="position:absolute;top:208px;left:469px;white-space:nowrap" class="ft79">&#160;</p>
								<p style="position:absolute;top:206px;left:469px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:211px;left:473px;white-space:nowrap" class="ft711"><b>&#160;</b></p>
								<p style="position:absolute;top:222px;left:469px;white-space:nowrap" class="ft712"><b>&#160;</b></p>
								<p style="position:absolute;top:242px;left:55px;white-space:nowrap" class="ft78">Name
												of&#160;the&#160;Taxpayer: &#160;</p>
								<p style="position:absolute;top:234px;left:231px;white-space:nowrap" class="ft713"><b>………………………………..…</b>
								</p>
								<p style="position:absolute;top:243px;left:514px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:239px;left:536px;white-space:nowrap" class="ft715">TIN</p>
								<p style="position:absolute;top:242px;left:571px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:240px;left:591px;white-space:nowrap" class="ft76">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:265px;left:203px;white-space:nowrap" class="ft716">&#160;</p>
								<p style="position:absolute;top:279px;left:203px;white-space:nowrap" class="ft716">&#160;</p>
								<p style="position:absolute;top:292px;left:203px;white-space:nowrap" class="ft716">&#160;</p>
								<p style="position:absolute;top:308px;left:62px;white-space:nowrap" class="ft714">Serial&#160;</p>
								<p style="position:absolute;top:327px;left:69px;white-space:nowrap" class="ft714">No.&#160;&#160;</p>
								<p style="position:absolute;top:308px;left:233px;white-space:nowrap" class="ft78">Details of
												Expenditure&#160;&#160;</p>
								<p style="position:absolute;top:308px;left:539px;white-space:nowrap" class="ft714">
												Amount&#160;of&#160;Taka&#160;</p>
								<p style="position:absolute;top:308px;left:717px;white-space:nowrap" class="ft714">Comments&#160;&#160;</p>
								<p style="position:absolute;top:347px;left:75px;white-space:nowrap" class="ft714">1.<b>&#160;</b></p>
								<p style="position:absolute;top:347px;left:117px;white-space:nowrap" class="ft78">
												Personal&#160;&#160;and&#160;&#160;family&#160;&#160;fooding,&#160;&#160;clothing&#160;&#160;and&#160;&#160;other&#160;
								</p>
								<p style="position:absolute;top:379px;left:117px;white-space:nowrap" class="ft78">essentials&#160;</p>
								<p style="position:absolute;top:347px;left:528px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:347px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:410px;left:75px;white-space:nowrap" class="ft714">2.&#160;</p>
								<p style="position:absolute;top:410px;left:117px;white-space:nowrap" class="ft78">
												Housing&#160;Expense&#160;</p>
								<p style="position:absolute;top:410px;left:528px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:410px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:450px;left:75px;white-space:nowrap" class="ft714">3.&#160;</p>
								<p style="position:absolute;top:451px;left:117px;white-space:nowrap" class="ft78">Personal Transport
												Expense&#160;&#160;</p>
								<p style="position:absolute;top:451px;left:528px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:451px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:484px;left:75px;white-space:nowrap" class="ft714">4.&#160;</p>
								<p style="position:absolute;top:485px;left:117px;white-space:nowrap" class="ft78">
												Utility&#160;&#160;Expense&#160;&#160;(Electricity,&#160;&#160;Gas,&#160;&#160;Water,&#160;&#160;Telephone,&#160;
								</p>
								<p style="position:absolute;top:516px;left:117px;white-space:nowrap" class="ft78">Mobile,&#160;Internet
												etc.&#160;Bills)&#160;</p>
								<p style="position:absolute;top:484px;left:528px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:484px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:547px;left:75px;white-space:nowrap" class="ft714">5.&#160;</p>
								<p style="position:absolute;top:547px;left:117px;white-space:nowrap" class="ft78">Education Expense&#160;
								</p>
								<p style="position:absolute;top:547px;left:528px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:547px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:581px;left:75px;white-space:nowrap" class="ft714">6.&#160;</p>
								<p style="position:absolute;top:582px;left:117px;white-space:nowrap" class="ft78">
												Personal&#160;&#160;Expense&#160;&#160;for&#160;&#160;Local&#160;&#160;and&#160;&#160;Foreign&#160;&#160;Travel,&#160;
								</p>
								<p style="position:absolute;top:613px;left:117px;white-space:nowrap" class="ft78">Vacation etc.&#160;</p>
								<p style="position:absolute;top:581px;left:528px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:582px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:644px;left:75px;white-space:nowrap" class="ft714">7.&#160;</p>
								<p style="position:absolute;top:645px;left:117px;white-space:nowrap" class="ft78">Festival and Other
												Special Expense&#160;</p>
								<p style="position:absolute;top:645px;left:528px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:645px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:685px;left:75px;white-space:nowrap" class="ft714">8.&#160;</p>
								<p style="position:absolute;top:685px;left:117px;white-space:nowrap" class="ft78">
												Ta&#160;Deducted&#160;/&#160;Collected&#160;at&#160;Source&#160;(with&#160;TS&#160;on&#160;Profit&#160;</p>
								<p style="position:absolute;top:716px;left:117px;white-space:nowrap" class="ft78">
												of&#160;Sanchaypatra)&#160;and&#160;Tax&#160;&amp;&#160;Surcharge&#160;Paid&#160;based&#160;on&#160;</p>
								<p style="position:absolute;top:747px;left:117px;white-space:nowrap" class="ft78">Tax&#160;Return
												of&#160;Last Year)&#160;&#160;&#160;</p>
								<p style="position:absolute;top:685px;left:528px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:685px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:779px;left:75px;white-space:nowrap" class="ft714">9.&#160;</p>
								<p style="position:absolute;top:779px;left:117px;white-space:nowrap" class="ft78">
												Interest&#160;&#160;Paid&#160;&#160;on&#160;&#160;Personal&#160;&#160;Loan&#160;&#160;Received&#160;&#160;from&#160;
								</p>
								<p style="position:absolute;top:810px;left:117px;white-space:nowrap" class="ft78">Institution
												&amp;&#160;Other Source&#160;&#160;</p>
								<p style="position:absolute;top:779px;left:528px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:779px;left:676px;white-space:nowrap" class="ft710"><b>&#160;</b></p>
								<p style="position:absolute;top:841px;left:62px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:842px;left:371px;white-space:nowrap" class="ft77">Total
												Expenditure&#160;&#160;</p>
								<p style="position:absolute;top:841px;left:528px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:841px;left:676px;white-space:nowrap" class="ft714">&#160;</p>
								<p style="position:absolute;top:888px;left:108px;white-space:nowrap" class="ft717">&#160;</p>
								<p style="position:absolute;top:897px;left:162px;white-space:nowrap" class="ft70">&#160;</p>
								<p style="position:absolute;top:895px;left:142px;white-space:nowrap" class="ft78">&#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;</p>
								<p style="position:absolute;top:906px;left:421px;white-space:nowrap" class="ft79">&#160;</p>
								<p style="position:absolute;top:912px;left:142px;white-space:nowrap" class="ft715">&#160;</p>
								<p style="position:absolute;top:941px;left:437px;white-space:nowrap" class="ft75"><b>Demonstrate&#160;</b>
								</p>
								<p style="position:absolute;top:966px;left:74px;white-space:nowrap" class="ft715">
												I&#160;solemnly&#160;declare&#160;that&#160;to&#160;the&#160;best&#160;of&#160;my&#160;knowledge&#160;and&#160;belief&#160;the&#160;information&#160;given&#160;in&#160;
								</p>
								<p style="position:absolute;top:995px;left:74px;white-space:nowrap" class="ft715">this&#160;IT-10BB (2023)
												is&#160;correct&#160;and&#160;complete</p>
								<p style="position:absolute;top:997px;left:448px;white-space:nowrap" class="ft78">.&#160;&#160;</p>
								<p style="position:absolute;top:1022px;left:101px;white-space:nowrap" class="ft718">&#160;</p>
								<p style="position:absolute;top:1039px;left:101px;white-space:nowrap" class="ft719">&#160;</p>
								<p style="position:absolute;top:1053px;left:101px;white-space:nowrap" class="ft719">&#160;</p>
								<p style="position:absolute;top:1068px;left:101px;white-space:nowrap" class="ft719">&#160;</p>
								<p style="position:absolute;top:1079px;left:108px;white-space:nowrap" class="ft720">&#160; &#160;&#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;&#160; &#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;&#160; &#160;&#160;</p>
								<p style="position:absolute;top:1085px;left:526px;white-space:nowrap" class="ft713"><b>(</b></p>
								<p style="position:absolute;top:1082px;left:533px;white-space:nowrap" class="ft721"><b>…………………………………)</b>
								</p>
								<p style="position:absolute;top:1087px;left:791px;white-space:nowrap" class="ft722"><b>&#160;</b></p>
								<p style="position:absolute;top:1109px;left:554px;white-space:nowrap" class="ft729">Name
												&amp;&#160;signature of&#160;the&#160;Taxpayer&#160;<br />Date
												................................................&#160;</p>
								<p style="position:absolute;top:1147px;left:108px;white-space:nowrap" class="ft74">
												<i><b>&#160;</b>&#160;</i>
								</p>
								<p style="position:absolute;top:1172px;left:108px;white-space:nowrap" class="ft723"><i>&#160;</i></p>
								<p style="position:absolute;top:1188px;left:108px;white-space:nowrap" class="ft724"><i>&#160;</i></p>
								<p style="position:absolute;top:1192px;left:108px;white-space:nowrap" class="ft725"><i>&#160;</i></p>
								<p style="position:absolute;top:1200px;left:410px;white-space:nowrap" class="ft726"><b>&#160; &#160; &#160;
																&#160;&#160;</b></p>
								<p style="position:absolute;top:1197px;left:449px;white-space:nowrap" class="ft727"><b>&#160;7</b></p>
								<p style="position:absolute;top:1200px;left:468px;white-space:nowrap" class="ft726"><b>&#160;</b></p>
								<p style="position:absolute;top:100px;left:669px;white-space:nowrap" class="ft77">
												&#160;<b>IT-10BB(2023)</b></p>
								<p style="position:absolute;top:98px;left:799px;white-space:nowrap" class="ft713"><b>&#160;</b></p>
				</div>
				{{-- Page Eight --}}
				<div class="card mb-3" id="page8-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="target008.png" alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft80">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft81">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft82"><b>&#160;</b></p>
								<p style="position:absolute;top:59px;left:358px;white-space:nowrap" class="ft83"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;
																&#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;</b>&#160; &#160;
												&#160; &#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160;&#160;<b>IT-10B(2023)</b>&#160;</p>
								<p style="position:absolute;top:78px;left:478px;white-space:nowrap" class="ft85">&#160;</p>
								<p style="position:absolute;top:105px;left:108px;white-space:nowrap" class="ft86"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160;
																&#160;&#160;&#160;&#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160;&#160; &#160; &#160;
																&#160; &#160; &#160;&#160;&#160;&#160; &#160;&#160;</b></p>
								<p style="position:absolute;top:89px;left:129px;white-space:nowrap" class="ft87"><b>Statement&#160;of
																Assets, Liabilities and Expenses&#160;(as on&#160;</b></p>
								<p style="position:absolute;top:93px;left:662px;white-space:nowrap" class="ft88">
												..................................<b>)&#160;</b></p>
								<p style="position:absolute;top:115px;left:469px;white-space:nowrap" class="ft89"><b>&#160;</b></p>
								<p style="position:absolute;top:140px;left:316px;white-space:nowrap" class="ft87">
												<b>To&#160;Whom&#160;It&#160;May&#160;Concern&#160;</b>
								</p>
								<p style="position:absolute;top:162px;left:76px;white-space:nowrap" class="ft810"></p>
								<p style="position:absolute;top:167px;left:84px;white-space:nowrap" class="ft88">&#160;&#160;All
												Public&#160;Servants.&#160;&#160;</p>
								<p style="position:absolute;top:184px;left:76px;white-space:nowrap" class="ft810"></p>
								<p style="position:absolute;top:189px;left:84px;white-space:nowrap" class="ft88">&#160;&#160;If&#160;the
												amount&#160;of Total Asset at home and abroad exceeds Taka&#160;40,00,000&#160;</p>
								<p style="position:absolute;top:206px;left:76px;white-space:nowrap" class="ft810"></p>
								<p style="position:absolute;top:211px;left:84px;white-space:nowrap" class="ft88">
												&#160;&#160;The&#160;&#160;amount&#160;&#160;of&#160;&#160;Total&#160;&#160;Asset&#160;&#160;does&#160;&#160;not&#160;&#160;exceed&#160;&#160;Tk.&#160;&#160;40,00,000&#160;&#160;but&#160;&#160;owns&#160;&#160;a&#160;&#160;Motor&#160;&#160;Car&#160;&#160;in&#160;&#160;any&#160;&#160;time&#160;&#160;or&#160;
								</p>
								<p style="position:absolute;top:232px;left:103px;white-space:nowrap" class="ft829">
												Invested&#160;&#160;in&#160;&#160;any&#160;&#160;House&#160;&#160;Popery&#160;&#160;or&#160;&#160;Apartment&#160;&#160;within&#160;&#160;the&#160;&#160;City&#160;&#160;Corporation&#160;&#160;area&#160;&#160;or&#160;&#160;Owns&#160;&#160;Assets&#160;<br />outside&#160;Bangladesh
												or being&#160;a&#160;Shareholder&#160;Director of&#160;a&#160;Company.&#160;&#160;</p>
								<p style="position:absolute;top:269px;left:76px;white-space:nowrap" class="ft811"></p>
								<p style="position:absolute;top:274px;left:83px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:274px;left:103px;white-space:nowrap" class="ft829">
												Every&#160;&#160;Non-Bangladeshi&#160;&#160;and&#160;&#160;Non-Resident&#160;&#160;Bangladesh&#160;&#160;Natural&#160;&#160;Person&#160;&#160;shall&#160;&#160;submit&#160;&#160;the&#160;&#160;statement&#160;<br />only&#160;in
												respect of Assets Located in&#160;Bangladesh</p>
								<p style="position:absolute;top:295px;left:449px;white-space:nowrap" class="ft812">.&#160;</p>
								<p style="position:absolute;top:315px;left:103px;white-space:nowrap" class="ft89"><b>&#160;</b></p>
								<p style="position:absolute;top:335px;left:469px;white-space:nowrap" class="ft813"><b>&#160;</b></p>
								<p style="position:absolute;top:347px;left:469px;white-space:nowrap" class="ft814"><b>&#160;</b></p>
								<p style="position:absolute;top:341px;left:469px;white-space:nowrap" class="ft815"><b>&#160;</b></p>
								<p style="position:absolute;top:352px;left:473px;white-space:nowrap" class="ft86"><b>&#160;</b></p>
								<p style="position:absolute;top:353px;left:469px;white-space:nowrap" class="ft86"><b>&#160;</b></p>
								<p style="position:absolute;top:363px;left:55px;white-space:nowrap" class="ft88">Name
												of&#160;the&#160;Assessee: &#160;</p>
								<p style="position:absolute;top:356px;left:228px;white-space:nowrap" class="ft816"><b>………………………………..…</b>
								</p>
								<p style="position:absolute;top:364px;left:511px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:360px;left:535px;white-space:nowrap" class="ft817">TIN</p>
								<p style="position:absolute;top:363px;left:570px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:362px;left:589px;white-space:nowrap" class="ft87">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:386px;left:108px;white-space:nowrap" class="ft830">
												&#160;<br />&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:430px;left:65px;white-space:nowrap" class="ft84">1.</p>
								<p style="position:absolute;top:432px;left:79px;white-space:nowrap" class="ft815"><b>&#160;</b></p>
								<p style="position:absolute;top:430px;left:84px;white-space:nowrap" class="ft83"><b>Sources&#160;of
																Fund&#160;</b>:</p>
								<p style="position:absolute;top:431px;left:229px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:452px;left:86px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:452px;left:108px;white-space:nowrap" class="ft88">(i)&#160;</p>
								<p style="position:absolute;top:453px;left:129px;white-space:nowrap" class="ft812">Total&#160;Income Shown
												in&#160;Return&#160;&#160;</p>
								<p style="position:absolute;top:453px;left:378px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:453px;left:432px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:453px;left:486px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:452px;left:540px;white-space:nowrap" class="ft88">Tk.&#160;&#160;
												&#160;4,17,000/-&#160;</p>
								<p style="position:absolute;top:472px;left:86px;white-space:nowrap" class="ft81">&#160; &#160; &#160;
												&#160; &#160;&#160;(Sl.&#160;No.&#160;11&#160;of&#160;Statement&#160;of&#160;Total&#160;Income)</p>
								<p style="position:absolute;top:470px;left:375px;white-space:nowrap" class="ft88">&#160;&#160;</p>
								<p style="position:absolute;top:490px;left:86px;white-space:nowrap" class="ft88">&#160;
												&#160;&#160;(ii)&#160;</p>
								<p style="position:absolute;top:491px;left:131px;white-space:nowrap" class="ft812">Tax Exempted Income
												(Pls&#160;see&#160;Instruction Page)</p>
								<p style="position:absolute;top:490px;left:454px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:490px;left:486px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:490px;left:540px;white-space:nowrap" class="ft88">
												Tk.&#160;&#160;17,60,000/-&#160;</p>
								<p style="position:absolute;top:521px;left:86px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:521px;left:108px;white-space:nowrap" class="ft88">(iii</p>
								<p style="position:absolute;top:522px;left:129px;white-space:nowrap" class="ft812">
												&#160;Receipt&#160;of&#160;Gift&#160;and Others</p>
								<p style="position:absolute;top:521px;left:308px;white-space:nowrap" class="ft88">&#160;&#160;&#160;</p>
								<p style="position:absolute;top:521px;left:378px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:521px;left:432px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:521px;left:486px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:521px;left:540px;white-space:nowrap" class="ft88">
												Tk.&#160;16,30,0000&#160;</p>
								<p style="position:absolute;top:548px;left:86px;white-space:nowrap" class="ft819">&#160;</p>
								<p style="position:absolute;top:555px;left:86px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:555px;left:108px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:555px;left:162px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:555px;left:216px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:555px;left:270px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:555px;left:324px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:555px;left:378px;white-space:nowrap" class="ft88">&#160;</p>
								<p style="position:absolute;top:555px;left:432px;white-space:nowrap" class="ft88">&#160; &#160; &#160;
												&#160; &#160; &#160;</p>
								<p style="position:absolute;top:554px;left:482px;white-space:nowrap" class="ft84">Total Source
												of&#160;Fund:</p>
								<p style="position:absolute;top:555px;left:653px;white-space:nowrap" class="ft88">&#160; &#160;&#160;</p>
								<p style="position:absolute;top:554px;left:671px;white-space:nowrap" class="ft84">Tk</p>
								<p style="position:absolute;top:556px;left:693px;white-space:nowrap" class="ft812">
												.................................</p>
								<p style="position:absolute;top:553px;left:829px;white-space:nowrap" class="ft820"><b>&#160;</b></p>
								<p style="position:absolute;top:573px;left:86px;white-space:nowrap" class="ft821"><b>&#160;</b></p>
								<p style="position:absolute;top:577px;left:86px;white-space:nowrap" class="ft822"><b>&#160;</b></p>
								<p style="position:absolute;top:587px;left:65px;white-space:nowrap" class="ft84">2</p>
								<p style="position:absolute;top:589px;left:75px;white-space:nowrap" class="ft812">.&#160;</p>
								<p style="position:absolute;top:587px;left:83px;white-space:nowrap" class="ft83"><b>Net wealth as on last
																date of previous&#160;income year</b>&#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160;
												&#160;&#160;&#160; &#160; &#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160; &#160; &#160;&#160;Tk</p>
								<p style="position:absolute;top:589px;left:695px;white-space:nowrap" class="ft812">
												................................</p>
								<p style="position:absolute;top:587px;left:827px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:613px;left:65px;white-space:nowrap" class="ft823">&#160;</p>
								<p style="position:absolute;top:649px;left:65px;white-space:nowrap" class="ft84">3.</p>
								<p style="position:absolute;top:651px;left:79px;white-space:nowrap" class="ft812">&#160;.&#160;</p>
								<p style="position:absolute;top:645px;left:92px;white-space:nowrap" class="ft83"><b>Sum&#160;of Source
																of&#160;Fund and Previous Year’s Net&#160;Wealth (2 +3)&#160;</b></p>
								<p style="position:absolute;top:649px;left:648px;white-space:nowrap" class="ft84">&#160; &#160; &#160;Tk
								</p>
								<p style="position:absolute;top:651px;left:694px;white-space:nowrap" class="ft812">
												................................&#160;</p>
								<p style="position:absolute;top:671px;left:65px;white-space:nowrap" class="ft831">&#160;<br />&#160;</p>
								<p style="position:absolute;top:709px;left:65px;white-space:nowrap" class="ft84">4.(a)Expenses
												relating&#160;to lifestyle&#160;</p>
								<p style="position:absolute;top:712px;left:332px;white-space:nowrap" class="ft81">
												(as&#160;per&#160;IT-10BB(&#160;</p>
								<p style="position:absolute;top:709px;left:439px;white-space:nowrap" class="ft84">&#160;&#160;&#160;&#160;
								</p>
								<p style="position:absolute;top:709px;left:486px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:709px;left:540px;white-space:nowrap" class="ft84">&#160;Tk………………&#160;</p>
								<p style="position:absolute;top:729px;left:65px;white-space:nowrap" class="ft818">&#160;</p>
								<p style="position:absolute;top:742px;left:65px;white-space:nowrap" class="ft84">&#160; &#160;</p>
								<p style="position:absolute;top:744px;left:79px;white-space:nowrap" class="ft812">(b)&#160;</p>
								<p style="position:absolute;top:742px;left:103px;white-space:nowrap" class="ft84">Gift / Expenses
												/&#160;Loss Not&#160;Mentioned &#160;in IT-10BB&#160;</p>
								<p style="position:absolute;top:742px;left:540px;white-space:nowrap" class="ft84">&#160;Tk………………&#160;</p>
								<p style="position:absolute;top:766px;left:65px;white-space:nowrap" class="ft812">&#160;&#160;</p>
								<p style="position:absolute;top:764px;left:73px;white-space:nowrap" class="ft84">&#160;&#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160;
												&#160; &#160;&#160;</p>
								<p style="position:absolute;top:766px;left:254px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:764px;left:258px;white-space:nowrap" class="ft84">&#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;
												&#160;&#160;&#160;&#160;&#160; &#160; &#160; &#160;Total&#160;expenses and loss&#160;</p>
								<p style="position:absolute;top:766px;left:662px;white-space:nowrap" class="ft812">=&#160;</p>
								<p style="position:absolute;top:764px;left:675px;white-space:nowrap" class="ft84">Tk</p>
								<p style="position:absolute;top:766px;left:697px;white-space:nowrap" class="ft812">
												................................</p>
								<p style="position:absolute;top:765px;left:829px;white-space:nowrap" class="ft89"><b>&#160;</b></p>
								<p style="position:absolute;top:785px;left:65px;white-space:nowrap" class="ft824"><b>&#160;</b></p>
								<p style="position:absolute;top:795px;left:65px;white-space:nowrap" class="ft825"><b>&#160;</b></p>
								<p style="position:absolute;top:809px;left:65px;white-space:nowrap" class="ft84">5.&#160;<b>Net wealth as
																on last date of this&#160;Financial Year(3-4)</b>&#160;&#160; &#160;&#160;</p>
								<p style="position:absolute;top:810px;left:545px;white-space:nowrap" class="ft88">&#160; &#160;
												&#160;&#160;</p>
								<p style="position:absolute;top:809px;left:572px;white-space:nowrap" class="ft84">
												&#160;&#160;&#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:809px;left:648px;white-space:nowrap" class="ft84">&#160;
												&#160;&#160;&#160;Tk</p>
								<p style="position:absolute;top:811px;left:694px;white-space:nowrap" class="ft812">
												................................</p>
								<p style="position:absolute;top:809px;left:826px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:828px;left:65px;white-space:nowrap" class="ft819">&#160;</p>
								<p style="position:absolute;top:834px;left:65px;white-space:nowrap" class="ft826">&#160;</p>
								<p style="position:absolute;top:861px;left:65px;white-space:nowrap" class="ft84">6.&#160;&#160;</p>
								<p style="position:absolute;top:860px;left:89px;white-space:nowrap" class="ft820">
												<b>Personal&#160;Liabilities&#160;Outside Bangladesh</b>
								</p>
								<p style="position:absolute;top:861px;left:447px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:883px;left:86px;white-space:nowrap" class="ft84">
												&#160;&#160;(i)&#160;Institutional Liabilities&#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:883px;left:378px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:883px;left:432px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:883px;left:486px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:883px;left:540px;white-space:nowrap" class="ft84">&#160; &#160;
												&#160;&#160;Tk. …………………&#160;</p>
								<p style="position:absolute;top:917px;left:86px;white-space:nowrap" class="ft84">
												&#160;&#160;(ii)&#160;Non-Institutional Liabilities&#160; &#160;&#160;&#160; &#160; &#160; &#160;&#160;</p>
								<p style="position:absolute;top:917px;left:432px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:917px;left:486px;white-space:nowrap" class="ft84">&#160; &#160;
												&#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;Tk. …………………&#160;</p>
								<p style="position:absolute;top:951px;left:86px;white-space:nowrap" class="ft84">
												&#160;&#160;(iii)&#160;Other Liabilities</p>
								<p style="position:absolute;top:949px;left:271px;white-space:nowrap" class="ft826">&#160;</p>
								<p style="position:absolute;top:951px;left:324px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:951px;left:378px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:951px;left:432px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:951px;left:486px;white-space:nowrap" class="ft84">&#160; &#160; &#160;
												&#160; &#160; &#160; &#160; &#160; &#160;Tk. …………………&#160;</p>
								<p style="position:absolute;top:982px;left:86px;white-space:nowrap" class="ft818">&#160;</p>
								<p style="position:absolute;top:997px;left:86px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:997px;left:108px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:997px;left:162px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:997px;left:216px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:997px;left:270px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:997px;left:324px;white-space:nowrap" class="ft812">&#160;</p>
								<p style="position:absolute;top:995px;left:328px;white-space:nowrap" class="ft84">Total Liabilities
												Outside Bangladesh</p>
								<p style="position:absolute;top:994px;left:615px;white-space:nowrap" class="ft817">&#160;</p>
								<p style="position:absolute;top:997px;left:620px;white-space:nowrap" class="ft812">= &#160; &#160; &#160;
												&#160;</p>
								<p style="position:absolute;top:995px;left:662px;white-space:nowrap" class="ft84">Tk</p>
								<p style="position:absolute;top:997px;left:684px;white-space:nowrap" class="ft812">
												................................</p>
								<p style="position:absolute;top:996px;left:816px;white-space:nowrap" class="ft89"><b>&#160;</b></p>
								<p style="position:absolute;top:1015px;left:86px;white-space:nowrap" class="ft825"><b>&#160;</b></p>
								<p style="position:absolute;top:1029px;left:65px;white-space:nowrap" class="ft84">
												7.&#160;<b>Gross&#160;Wealth (&#160;5+6)</b>&#160;&#160;&#160;&#160;&#160; &#160; &#160; &#160;
												&#160;&#160;&#160;&#160;&#160; &#160;&#160; &#160; &#160; &#160;&#160; &#160; &#160;&#160; &#160;&#160;
												&#160;&#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:1030px;left:460px;white-space:nowrap" class="ft88">&#160; &#160;
												&#160;&#160;</p>
								<p style="position:absolute;top:1029px;left:487px;white-space:nowrap" class="ft84">&#160; &#160;&#160;</p>
								<p style="position:absolute;top:1029px;left:540px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:1029px;left:594px;white-space:nowrap" class="ft84">&#160;</p>
								<p style="position:absolute;top:1029px;left:648px;white-space:nowrap" class="ft84">&#160;&#160;Tk</p>
								<p style="position:absolute;top:1031px;left:679px;white-space:nowrap" class="ft812">
												................................&#160;</p>
								<p style="position:absolute;top:1052px;left:65px;white-space:nowrap" class="ft832">
												&#160;<br />&#160;<br />&#160;<br />&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:1170px;left:411px;white-space:nowrap" class="ft827"><b>&#160; &#160; &#160;
																&#160;&#160;</b></p>
								<p style="position:absolute;top:1167px;left:450px;white-space:nowrap" class="ft828"><b>&#160;8</b></p>
								<p style="position:absolute;top:1170px;left:468px;white-space:nowrap" class="ft827"><b>&#160;</b></p>
				</div>
				{{-- page Nine --}}
				<div class="card mb-3" id="page9-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target009.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft90">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft91">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft92"><b>&#160;</b></p>
								<p style="position:absolute;top:58px;left:65px;white-space:nowrap" class="ft921">&#160;<br />&#160;</p>
								<p style="position:absolute;top:99px;left:86px;white-space:nowrap" class="ft94"><b>&#160;</b></p>
								<p style="position:absolute;top:106px;left:65px;white-space:nowrap" class="ft95"><b>8.&#160;Particulars of
																Assets (if needed attach separate sheet)</b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:127px;left:86px;white-space:nowrap" class="ft93">(a)&#160;Total Asset
												of&#160;Business&#160;</p>
								<p style="position:absolute;top:127px;left:324px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:127px;left:378px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:127px;left:432px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:127px;left:486px;white-space:nowrap" class="ft93">&#160;&#160;Tk.
												…………………&#160;</p>
								<p style="position:absolute;top:150px;left:86px;white-space:nowrap" class="ft93">Less: Business
												Liabilities&#160;</p>
								<p style="position:absolute;top:153px;left:291px;white-space:nowrap" class="ft91">
												(Institutional&#160;&amp;&#160;Non-Institutional)&#160;</p>
								<p style="position:absolute;top:146px;left:499px;white-space:nowrap" class="ft93">Tk.&#160;…………………&#160;
								</p>
								<p style="position:absolute;top:174px;left:86px;white-space:nowrap" class="ft96">&#160;</p>
								<p style="position:absolute;top:174px;left:108px;white-space:nowrap" class="ft96">&#160;</p>
								<p style="position:absolute;top:174px;left:162px;white-space:nowrap" class="ft96">&#160;</p>
								<p style="position:absolute;top:174px;left:216px;white-space:nowrap" class="ft96">&#160;</p>
								<p style="position:absolute;top:174px;left:270px;white-space:nowrap" class="ft96">&#160;</p>
								<p style="position:absolute;top:174px;left:324px;white-space:nowrap" class="ft96">&#160;
												&#160;&#160;&#160;&#160;&#160;B</p>
								<p style="position:absolute;top:172px;left:364px;white-space:nowrap" class="ft93">usiness Capital
												of&#160;Partnership&#160;Firm&#160;</p>
								<p style="position:absolute;top:174px;left:644px;white-space:nowrap" class="ft96">= &#160;</p>
								<p style="position:absolute;top:172px;left:661px;white-space:nowrap" class="ft93">Tk</p>
								<p style="position:absolute;top:174px;left:683px;white-space:nowrap" class="ft96">
												...................................&#160;</p>
								<p style="position:absolute;top:191px;left:86px;white-space:nowrap" class="ft97">&#160;</p>
								<p style="position:absolute;top:198px;left:86px;white-space:nowrap" class="ft93">&#160;(<b>b) Director’s
																Shareholdings in companies*</b>&#160; &#160; &#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:198px;left:540px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:198px;left:594px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:198px;left:648px;white-space:nowrap" class="ft93">&#160;&#160;&#160;Tk</p>
								<p style="position:absolute;top:200px;left:684px;white-space:nowrap" class="ft96">
												...................................&#160;</p>
								<p style="position:absolute;top:211px;left:86px;white-space:nowrap" class="ft98">&#160;</p>
								<p style="position:absolute;top:217px;left:108px;white-space:nowrap" class="ft99">&#160;</p>
								<p style="position:absolute;top:226px;left:86px;white-space:nowrap" class="ft95"><b>(c) Capital&#160;of
																partnership business</b>&#160;&#160;</p>
								<p style="position:absolute;top:226px;left:432px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:226px;left:486px;white-space:nowrap" class="ft93">&#160; &#160; &#160;
												&#160;&#160;&#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;</p>
								<p style="position:absolute;top:226px;left:648px;white-space:nowrap" class="ft93">
												&#160;&#160;&#160;&#160;Tk</p>
								<p style="position:absolute;top:228px;left:689px;white-space:nowrap" class="ft96">
												..................................&#160;</p>
								<p style="position:absolute;top:247px;left:86px;white-space:nowrap" class="ft98">&#160;</p>
								<p style="position:absolute;top:262px;left:86px;white-space:nowrap" class="ft910">&#160;</p>
								<p style="position:absolute;top:276px;left:86px;white-space:nowrap" class="ft95">
												<b>(d)&#160;Non-Agricultural&#160;Property&#160;/ land /&#160;House Property</b>&#160;&#160;
								</p>
								<p style="position:absolute;top:276px;left:594px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:276px;left:648px;white-space:nowrap" class="ft93">&#160; &#160;&#160;Tk
								</p>
								<p style="position:absolute;top:278px;left:689px;white-space:nowrap" class="ft96">
												..................................</p>
								<p style="position:absolute;top:276px;left:830px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:297px;left:108px;white-space:nowrap" class="ft922">(Acquisition&#160;/ Cost
												Value&#160;with&#160;Legal Expense&#160;/&#160;Acquired&#160;Price&#160;&#160;/ Building&#160;Cost
												/&#160;Investment)&#160;<br />&#160;Location&#160;and&#160;Description&#160;of&#160;&#160;&#160;&#160;Non-Agricultural&#160;Property&#160;(use&#160;separate&#160;sheet
												if&#160;needed)&#160;</p>
								<p style="position:absolute;top:311px;left:648px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:311px;left:702px;white-space:nowrap" class="ft93">&#160;&#160;
												&#160;&#160;</p>
								<p style="position:absolute;top:330px;left:86px;white-space:nowrap" class="ft911"><b>&#160;</b></p>
								<p style="position:absolute;top:343px;left:86px;white-space:nowrap" class="ft95"><b>(e) Agricultural
																Property</b>&#160;&#160;</p>
								<p style="position:absolute;top:343px;left:324px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:343px;left:378px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:343px;left:432px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:343px;left:486px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:343px;left:540px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:343px;left:594px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:343px;left:648px;white-space:nowrap" class="ft93">&#160; &#160;&#160;Tk
								</p>
								<p style="position:absolute;top:345px;left:689px;white-space:nowrap" class="ft96">
												..................................</p>
								<p style="position:absolute;top:343px;left:830px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:360px;left:86px;white-space:nowrap" class="ft93">&#160;&#160;&#160;</p>
								<p style="position:absolute;top:364px;left:101px;white-space:nowrap" class="ft98">
												(Acquisition&#160;/&#160;Cost&#160;Value&#160;with&#160;Legal&#160;Expense)&#160;Location&#160;and&#160;&#160;&#160;&#160;
								</p>
								<p style="position:absolute;top:380px;left:86px;white-space:nowrap" class="ft98">&#160;
												&#160;&#160;Description&#160;&#160;&#160;of&#160;Non-Agricultural&#160;&#160;&#160;Property&#160;&#160;(use&#160;separate
												sheet&#160;if&#160;needed)&#160;</p>
								<p style="position:absolute;top:376px;left:540px;white-space:nowrap" class="ft93">&#160; &#160; &#160;
												&#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:376px;left:648px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:376px;left:702px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:376px;left:756px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:376px;left:810px;white-space:nowrap" class="ft93">&#160;&#160; &#160;</p>
								<p style="position:absolute;top:378px;left:830px;white-space:nowrap" class="ft96">&#160;</p>
								<p style="position:absolute;top:397px;left:86px;white-space:nowrap" class="ft912">&#160;</p>
								<p style="position:absolute;top:425px;left:65px;white-space:nowrap" class="ft913"><b>&#160; &#160;
																&#160;&#160;</b></p>
								<p style="position:absolute;top:423px;left:90px;white-space:nowrap" class="ft95"><b>(f)
																Financial&#160;assets&#160;value</b></p>
								<p style="position:absolute;top:424px;left:294px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:444px;left:86px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:444px;left:108px;white-space:nowrap" class="ft915">
												(i)&#160;Share/Deventure/Bond/Securities/Unit&#160;Certificate etc&#160;</p>
								<p style="position:absolute;top:444px;left:540px;white-space:nowrap" class="ft915">Tk.&#160;&#160;
												&#160;4,17,000/-&#160;</p>
								<p style="position:absolute;top:465px;left:86px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:465px;left:108px;white-space:nowrap" class="ft915">
												(ii)&#160;Sanchaypatra/Deposit&#160;Pension&#160;Schem&#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:465px;left:486px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:465px;left:540px;white-space:nowrap" class="ft915">Tk.
												&#160;17,60,000/-&#160;</p>
								<p style="position:absolute;top:486px;left:86px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:486px;left:108px;white-space:nowrap" class="ft915">
												(iii)&#160;Loan&#160;Given(Mentioned Name&#160;&amp;&#160;NID&#160;</p>
								<p style="position:absolute;top:487px;left:416px;white-space:nowrap" class="ft96">
												of&#160;Loan&#160;Receiver</p>
								<p style="position:absolute;top:486px;left:531px;white-space:nowrap" class="ft915">)&#160;Tk.
												16,30,0000&#160;</p>
								<p style="position:absolute;top:506px;left:86px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:506px;left:108px;white-space:nowrap" class="ft915">(iv)&#160;Savings
												Deposit /Term Deposit&#160;&#160;&#160;&#160;</p>
								<p style="position:absolute;top:506px;left:432px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:506px;left:486px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:506px;left:540px;white-space:nowrap" class="ft915">Tk.
												&#160;17,60,000/-&#160;</p>
								<p style="position:absolute;top:527px;left:86px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:527px;left:108px;white-space:nowrap" class="ft915">&#160;(v)&#160;Provident
												fund or&#160;other fund (if&#160;any)&#160;</p>
								<p style="position:absolute;top:527px;left:432px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:527px;left:486px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:527px;left:540px;white-space:nowrap" class="ft915">
												Tk.&#160;16,30,0000&#160;</p>
								<p style="position:absolute;top:548px;left:86px;white-space:nowrap" class="ft915">&#160;
												&#160;&#160;&#160;(vi)&#160;Other investment&#160;&#160;&#160;</p>
								<p style="position:absolute;top:548px;left:324px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:548px;left:378px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:548px;left:432px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:548px;left:486px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:548px;left:540px;white-space:nowrap" class="ft915">Tk. 16,30,0000&#160;</p>
								<p style="position:absolute;top:570px;left:86px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:570px;left:108px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:570px;left:162px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:570px;left:216px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:570px;left:270px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:570px;left:324px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:570px;left:378px;white-space:nowrap" class="ft915">&#160;</p>
								<p style="position:absolute;top:570px;left:432px;white-space:nowrap" class="ft915">&#160; &#160;
												&#160;&#160;Total Financial Assets:=&#160; &#160;</p>
								<p style="position:absolute;top:569px;left:649px;white-space:nowrap" class="ft93">Tk</p>
								<p style="position:absolute;top:571px;left:670px;white-space:nowrap" class="ft96">
												.....................................</p>
								<p style="position:absolute;top:569px;left:823px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:592px;left:86px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:614px;left:59px;white-space:nowrap" class="ft93">&#160; &#160;
												&#160;(g)&#160;<b>Motor Vehicles&#160;(at cost)&#160;&#160;&#160;&#160;</b></p>
								<p style="position:absolute;top:614px;left:378px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:614px;left:432px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:614px;left:486px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:614px;left:540px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:614px;left:594px;white-space:nowrap" class="ft93">&#160; &#160; &#160;
												&#160; &#160;&#160;&#160;Tk</p>
								<p style="position:absolute;top:617px;left:669px;white-space:nowrap" class="ft91">
												.........................................</p>
								<p style="position:absolute;top:614px;left:823px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:636px;left:108px;white-space:nowrap" class="ft96">
												Cost&#160;Value&#160;including&#160;Registration Expense)&#160;</p>
								<p style="position:absolute;top:655px;left:86px;white-space:nowrap" class="ft96">&#160; &#160;
												&#160;(Mention&#160;Type and Registration Number&#160;of&#160;Motor&#160;Vehicle)</p>
								<p style="position:absolute;top:653px;left:502px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:674px;left:59px;white-space:nowrap" class="ft93">&#160; &#160;
												&#160;(h)&#160;<b>Ornaments&#160; (Mention Quantity)&#160;</b>&#160; &#160; &#160; &#160;&#160;&#160;
												&#160;&#160;&#160;</p>
								<p style="position:absolute;top:674px;left:486px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:674px;left:540px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:674px;left:594px;white-space:nowrap" class="ft93">&#160; &#160; &#160;
												&#160;&#160;&#160;&#160;&#160;Tk</p>
								<p style="position:absolute;top:677px;left:669px;white-space:nowrap" class="ft91">
												.........................................</p>
								<p style="position:absolute;top:674px;left:823px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:697px;left:59px;white-space:nowrap" class="ft921">&#160;<br />&#160; &#160;
												&#160;(i)&#160;<b>Furniture,&#160;Electronic&#160;Items&#160;</b></p>
								<p style="position:absolute;top:719px;left:378px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:719px;left:432px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:719px;left:486px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:719px;left:540px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:719px;left:594px;white-space:nowrap" class="ft93">&#160; &#160; &#160;
												&#160; &#160; &#160;&#160;Tk</p>
								<p style="position:absolute;top:722px;left:674px;white-space:nowrap" class="ft91">
												.........................................</p>
								<p style="position:absolute;top:719px;left:828px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:742px;left:59px;white-space:nowrap" class="ft921">&#160;<br />&#160; &#160;
												&#160;(j)&#160;</p>
								<p style="position:absolute;top:765px;left:107px;white-space:nowrap" class="ft914"><b>Others Assets&#160;(
																Except Assets&#160;Mentioned&#160;in&#160;Sl.K)&#160;&#160;</b></p>
								<p style="position:absolute;top:765px;left:540px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:765px;left:594px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:769px;left:648px;white-space:nowrap" class="ft916"><b>&#160;</b></p>
								<p style="position:absolute;top:764px;left:651px;white-space:nowrap" class="ft93">Tk</p>
								<p style="position:absolute;top:767px;left:673px;white-space:nowrap" class="ft91">
												.........................................</p>
								<p style="position:absolute;top:769px;left:827px;white-space:nowrap" class="ft916"><b>&#160;</b></p>
								<p style="position:absolute;top:785px;left:59px;white-space:nowrap" class="ft916"><b>&#160;</b></p>
								<p style="position:absolute;top:802px;left:59px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:802px;left:86px;white-space:nowrap" class="ft93">(k)</p>
								<p style="position:absolute;top:802px;left:109px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:800px;left:114px;white-space:nowrap" class="ft917">
												Cash&#160;in&#160;Hand&#160;and&#160;Fund&#160;Outside Business</p>
								<p style="position:absolute;top:802px;left:463px;white-space:nowrap" class="ft914"><b>&#160;:&#160;</b></p>
								<p style="position:absolute;top:824px;left:59px;white-space:nowrap" class="ft914"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160;i) &#160;Bank&#160;Balance&#160;</b></p>
								<p style="position:absolute;top:824px;left:270px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:824px;left:324px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:824px;left:378px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:824px;left:432px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:821px;left:486px;white-space:nowrap" class="ft914"><b>Tk………………………&#160;</b>
								</p>
								<p style="position:absolute;top:845px;left:59px;white-space:nowrap" class="ft914"><b>&#160; &#160; &#160;
																&#160; &#160; &#160;&#160;ii) &#160;Cash&#160;in&#160;Hand&#160;</b></p>
								<p style="position:absolute;top:845px;left:270px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:845px;left:324px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:845px;left:378px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:845px;left:432px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:841px;left:486px;white-space:nowrap" class="ft914">
												<b>Tk……………………….&#160;</b>
								</p>
								<p style="position:absolute;top:866px;left:59px;white-space:nowrap" class="ft914"><b>&#160; &#160; &#160;
																&#160; &#160; &#160;&#160;iii) Others&#160;</b></p>
								<p style="position:absolute;top:866px;left:216px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:866px;left:270px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:866px;left:324px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:866px;left:378px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:866px;left:432px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:862px;left:486px;white-space:nowrap" class="ft914">
												<b>Tk……………………….&#160;</b>
								</p>
								<p style="position:absolute;top:887px;left:59px;white-space:nowrap" class="ft914"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160;&#160;&#160;&#160;</b></p>
								<p style="position:absolute;top:887px;left:162px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:887px;left:216px;white-space:nowrap" class="ft914"><b>&#160;</b></p>
								<p style="position:absolute;top:887px;left:270px;white-space:nowrap" class="ft914"><b>Total
																Cash&#160;in&#160;Hand&#160;and&#160;Fund&#160;Outside&#160;Business: &#160;</b></p>
								<p style="position:absolute;top:886px;left:651px;white-space:nowrap" class="ft93">Tk</p>
								<p style="position:absolute;top:890px;left:672px;white-space:nowrap" class="ft91">
												.........................................</p>
								<p style="position:absolute;top:909px;left:86px;white-space:nowrap" class="ft95"><b>&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:909px;left:162px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:909px;left:216px;white-space:nowrap" class="ft93">&#160;&#160;</p>
								<p style="position:absolute;top:931px;left:65px;white-space:nowrap" class="ft93">9. &#160;
												Asset&#160;Outside&#160;Bangladesh&#160;</p>
								<p style="position:absolute;top:931px;left:324px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:931px;left:378px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:931px;left:432px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:931px;left:486px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:931px;left:540px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:931px;left:594px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:931px;left:648px;white-space:nowrap" class="ft93">&#160;Tk…………………..&#160;
								</p>
								<p style="position:absolute;top:954px;left:65px;white-space:nowrap" class="ft921">&#160;<br />10.
												&#160;Total&#160;Assets in Bangladesh and Outside&#160;Bangladesh&#160;( 8+9)&#160;</p>
								<p style="position:absolute;top:976px;left:594px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:976px;left:648px;white-space:nowrap" class="ft93">&#160;Tk…………………..&#160;
								</p>
								<p style="position:absolute;top:1001px;left:59px;white-space:nowrap" class="ft918">&#160;</p>
								<p style="position:absolute;top:1029px;left:108px;white-space:nowrap" class="ft919">&#160;</p>
								<p style="position:absolute;top:1035px;left:419px;white-space:nowrap" class="ft95">
												<b>Verification&#160;</b>
								</p>
								<p style="position:absolute;top:1056px;left:108px;white-space:nowrap" class="ft923">
												I&#160;solemnly&#160;declare&#160;that&#160;to&#160;the best&#160;of&#160;my&#160;knowledge and
												belief&#160;the information given in this
												IT-10B&#160;(2023)&#160;is&#160;<br />correct&#160;and&#160;complete.&#160;</p>
								<p style="position:absolute;top:1095px;left:554px;white-space:nowrap" class="ft93">&#160;</p>
								<p style="position:absolute;top:1118px;left:108px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1118px;left:162px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1118px;left:216px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1118px;left:270px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1118px;left:324px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1118px;left:378px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1118px;left:432px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1118px;left:486px;white-space:nowrap" class="ft95"><b>&#160; &#160; &#160;
																&#160;Name&#160;&amp; signature of the&#160;Taxpayers&#160;&#160;</b></p>
								<p style="position:absolute;top:1140px;left:108px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1140px;left:162px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1140px;left:216px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1140px;left:270px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1140px;left:324px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1140px;left:378px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1140px;left:432px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1140px;left:486px;white-space:nowrap" class="ft95"><b>&#160;&#160;&#160;
																&#160; &#160;Date ................................&#160;</b></p>
								<p style="position:absolute;top:1163px;left:554px;white-space:nowrap" class="ft95"><b>&#160;</b></p>
								<p style="position:absolute;top:1205px;left:423px;white-space:nowrap" class="ft920">9&#160;</p>
				</div>
				{{-- Page ten --}}
				<div id="page10-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target010.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft100">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft101">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft102"><b>&#160;</b></p>
								<p style="position:absolute;top:59px;left:108px;white-space:nowrap" class="ft1014">
												<i><b>&#160;<br />&#160;<br />&#160;</b></i>
								</p>
								<p style="position:absolute;top:126px;left:456px;white-space:nowrap" class="ft1015">
												<b>&#160;<br />&#160;</b>
								</p>
								<p style="position:absolute;top:169px;left:232px;white-space:nowrap" class="ft105">
												<b>Instructions&#160;to&#160;fill&#160;up&#160;the&#160;Return Form&#160;</b>
								</p>
								<p style="position:absolute;top:195px;left:456px;white-space:nowrap" class="ft106"><b>&#160;</b></p>
								<p style="position:absolute;top:201px;left:108px;white-space:nowrap" class="ft107">&#160;</p>
								<p style="position:absolute;top:216px;left:69px;white-space:nowrap" class="ft1016">
												<b>Instructions:&#160;<br />&#160;</b>
								</p>
								<p style="position:absolute;top:260px;left:68px;white-space:nowrap" class="ft109">
												(1)&#160;&#160;&#160;&#160;&#160;&#160;This&#160;&#160;Return&#160;&#160;of&#160;&#160;Income&#160;&#160;shall&#160;&#160;be&#160;&#160;Signed&#160;&#160;and&#160;&#160;Verified&#160;&#160;by&#160;&#160;the&#160;&#160;Taxpayer&#160;&#160;or&#160;&#160;his&#160;&#160;Authorized&#160;
								</p>
								<p style="position:absolute;top:282px;left:108px;white-space:nowrap" class="ft109">Representative as
												prescribed in the&#160;Income&#160;Tax Act, 2023.&#160;</p>
								<p style="position:absolute;top:305px;left:68px;white-space:nowrap" class="ft1017">&#160;<br />(2) &#160;
												&#160;&#160;Enclose where&#160;applicable:&#160;</p>
								<p style="position:absolute;top:350px;left:108px;white-space:nowrap" class="ft109">
												(a)&#160;Salary&#160;&#160;statement&#160;&#160;for&#160;&#160;salary;&#160;&#160;Bank&#160;&#160;statement&#160;&#160;for&#160;&#160;interest;&#160;&#160;Certificate&#160;&#160;for&#160;&#160;interest&#160;&#160;on&#160;
								</p>
								<p style="position:absolute;top:372px;left:135px;white-space:nowrap" class="ft1017">
												savings&#160;&#160;instruments;&#160;&#160;Rent&#160;&#160;agreement,&#160;&#160;receipts&#160;&#160;of&#160;&#160;municipal&#160;&#160;tax&#160;&#160;&amp;&#160;&#160;land&#160;&#160;revenue,&#160;<br />statement&#160;&#160;of&#160;&#160;house&#160;&#160;property&#160;&#160;loan&#160;&#160;interest,&#160;&#160;insurance&#160;&#160;premium&#160;&#160;for&#160;&#160;house&#160;&#160;property&#160;<br />income;&#160;&#160;Statement&#160;&#160;of&#160;&#160;Professional&#160;&#160;income&#160;&#160;as&#160;&#160;per&#160;&#160;IT&#160;&#160;Rule-8;&#160;&#160;Copy&#160;&#160;of&#160;&#160;assessment/&#160;<br />income&#160;statement&#160;&amp;&#160;balance&#160;sheet&#160;for&#160;partnership&#160;income;&#160;&#160;Documents&#160;of&#160;capital&#160;gain;&#160;<br />Dividend&#160;&#160;warrant&#160;&#160;for&#160;&#160;dividend&#160;&#160;income;&#160;&#160;Statement&#160;&#160;of&#160;&#160;other&#160;&#160;income;&#160;&#160;Documents&#160;&#160;in&#160;<br />support
												of&#160;investments&#160;in savings&#160;certificates,&#160;LIP, DPS, Zakat,&#160;stock/share etc.&#160;</p>
								<p style="position:absolute;top:507px;left:108px;white-space:nowrap" class="ft1017">
												(b)&#160;&#160;Depreciation&#160;Chart claiming depreciation as per the Income Tax
												Act,&#160;2023;&#160;<br />(d) &#160;Computation&#160;of&#160;Income according to the Income Tax&#160;Act,
												2023.&#160;</p>
								<p style="position:absolute;top:551px;left:68px;white-space:nowrap" class="ft1017">&#160;<br />(3) &#160;
												&#160;&#160;Enclose Separate&#160;Statement for:&#160;</p>
								<p style="position:absolute;top:596px;left:108px;white-space:nowrap" class="ft109">
												(a)&#160;any&#160;income&#160;of&#160;the&#160;spouse&#160;of&#160;the&#160;Taxpayer&#160;(if&#160;she/he&#160;is&#160;not&#160;an&#160;Taxpayer),&#160;minor&#160;children&#160;
								</p>
								<p style="position:absolute;top:619px;left:135px;white-space:nowrap" class="ft109">and
												dependent;&#160;&#160;</p>
								<p style="position:absolute;top:641px;left:108px;white-space:nowrap" class="ft1017">(b)&#160;Tax exempted /
												Tax free
												Income.&#160;<br />(c)&#160;Income&#160;Exempted&#160;from&#160;Tax&#160;declared&#160;under&#160;Part&#160;1&#160;of&#160;the&#160;Sixth&#160;Schedule&#160;of&#160;the&#160;Income&#160;
								</p>
								<p style="position:absolute;top:686px;left:135px;white-space:nowrap" class="ft109">Tax Act, 2023.&#160;</p>
								<p style="position:absolute;top:706px;left:68px;white-space:nowrap" class="ft1010">&#160;</p>
								<p style="position:absolute;top:721px;left:68px;white-space:nowrap" class="ft109">
												(4)&#160;&#160;Documents&#160;furnished&#160;to&#160;support&#160;the&#160;declaration&#160;should&#160;be&#160;signed&#160;by&#160;the&#160;Taxpayer&#160;or&#160;his/her&#160;
								</p>
								<p style="position:absolute;top:743px;left:108px;white-space:nowrap" class="ft109">
												authorized&#160;representative.&#160;</p>
								<p style="position:absolute;top:762px;left:68px;white-space:nowrap" class="ft1011">&#160;</p>
								<p style="position:absolute;top:769px;left:68px;white-space:nowrap" class="ft109">(5) &#160;&#160;Furnish
												the following information:&#160;</p>
								<p style="position:absolute;top:791px;left:101px;white-space:nowrap" class="ft1017">(a)&#160;Name, address
												&amp; TIN&#160;of&#160;the partners if&#160;the Taxpayer is a firm;&#160;<br />(b)&#160;Name of&#160;firm,
												address&#160;&amp; TIN if&#160;the Taxpayer&#160;is a partner;&#160;<br />(c)&#160;Name of&#160;the
												company,&#160;address &amp;&#160;TIN if&#160;the Taxpayer is a&#160;director.&#160;</p>
								<p style="position:absolute;top:856px;left:69px;white-space:nowrap" class="ft100">&#160;</p>
								<p style="position:absolute;top:867px;left:69px;white-space:nowrap" class="ft109">
												(6)&#160;&#160;Assets&#160;&#160;and&#160;&#160;liabilities&#160;&#160;of&#160;&#160;self,&#160;&#160;spouse&#160;&#160;(if&#160;&#160;she/he&#160;&#160;is&#160;&#160;not&#160;&#160;a&#160;&#160;Taxpayer),&#160;&#160;minor&#160;&#160;children&#160;&#160;and&#160;
								</p>
								<p style="position:absolute;top:890px;left:101px;white-space:nowrap" class="ft109">dependant(s) to be shown
												in the IT-10B (2023).&#160;</p>
								<p style="position:absolute;top:912px;left:69px;white-space:nowrap" class="ft1017">&#160;<br />(7) Signature
												is&#160;mandatory&#160;for all Taxpayer&#160;or&#160;his / her
												authorized&#160;representative.&#160;<br />&#160;<br />(8) For Natural Person,&#160;signature is
												also&#160;mandatory&#160;in IT-10B (2023)&#160;&amp; IT-10BB (2023).&#160;</p>
								<p style="position:absolute;top:1002px;left:68px;white-space:nowrap" class="ft1017">&#160;<br />(9)
												If&#160;needed, please&#160;use separate sheet.<b>&#160;</b></p>
								<p style="position:absolute;top:1049px;left:108px;white-space:nowrap" class="ft1018">
												&#160;<br />&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:1085px;left:108px;white-space:nowrap" class="ft1019">
												&#160;<br />&#160;<br />&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:1126px;left:439px;white-space:nowrap" class="ft1013"><b>10&#160;</b></p>
				</div>
				{{-- Page Eleven --}}
				<div id="page11-div" style="position:relative;width:892px;height:1262px;">
								<img width="892" height="1262" src="{{ asset('backend/assets/images/target011.png') }}"
												alt="background image" />
								<p style="position:absolute;top:4px;left:47px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:1206px;left:108px;white-space:nowrap" class="ft111">&#160;</p>
								<p style="position:absolute;top:1206px;left:465px;white-space:nowrap" class="ft112"><b>&#160;</b></p>
								<p style="position:absolute;top:59px;left:469px;white-space:nowrap" class="ft1123"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;
																&#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160;
																&#160;&#160;&#160;&#160;<br />&#160;</b></p>
								<p style="position:absolute;top:179px;left:529px;white-space:nowrap" class="ft113"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160; &#160; &#160;&#160;&#160; &#160;
																&#160; &#160;&#160;&#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;&#160;</b></p>
								<p style="position:absolute;top:197px;left:318px;white-space:nowrap" class="ft113"><b>The Peoples
																Republic&#160;of Bangladesh&#160;</b></p>
								<p style="position:absolute;top:220px;left:356px;white-space:nowrap" class="ft113">
												<b>National&#160;Board&#160;of Revenue</b>&#160; &#160; &#160; &#160;&#160; &#160; &#160;&#160;&#160;
								</p>
								<p style="position:absolute;top:242px;left:383px;white-space:nowrap" class="ft114">
												&#160;<b>(Income&#160;Tax&#160;Office)&#160;</b></p>
								<p style="position:absolute;top:263px;left:108px;white-space:nowrap" class="ft1124">&#160;<br />&#160;</p>
								<p style="position:absolute;top:295px;left:469px;white-space:nowrap" class="ft115"><b>&#160;</b></p>
								<p style="position:absolute;top:302px;left:469px;white-space:nowrap" class="ft116"><b>&#160;</b></p>
								<p style="position:absolute;top:323px;left:143px;white-space:nowrap" class="ft116"><b>ACKNOWLEDGEMENT
																RECEIPTS/&#160;CERTIFICATE&#160;OF&#160;RETURN OF&#160;INCOME&#160;</b></p>
								<p style="position:absolute;top:342px;left:469px;white-space:nowrap" class="ft117"><b>&#160;</b></p>
								<p style="position:absolute;top:359px;left:108px;white-space:nowrap" class="ft118"><b>Assessment&#160;year:
																&#160;&#160; &#160; &#160; &#160;&#160;&#160; &#160;&#160; &#160; &#160; &#160; &#160;&#160; &#160;
																&#160;&#160;&#160; &#160; &#160;&#160;&#160;&#160; &#160; &#160; &#160; &#160;&#160;</b></p>
								<p style="position:absolute;top:391px;left:108px;white-space:nowrap" class="ft119">
												<b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b>
								</p>
								<p style="position:absolute;top:395px;left:304px;white-space:nowrap" class="ft1110"><b>&#160;</b></p>
								<p style="position:absolute;top:415px;left:108px;white-space:nowrap" class="ft1111">&#160;</p>
								<p style="position:absolute;top:417px;left:469px;white-space:nowrap" class="ft1112"><b>&#160;</b></p>
								<p style="position:absolute;top:419px;left:108px;white-space:nowrap" class="ft1111">&#160;</p>
								<p style="position:absolute;top:430px;left:57px;white-space:nowrap" class="ft1113">1.&#160;</p>
								<p style="position:absolute;top:428px;left:84px;white-space:nowrap" class="ft1114">
												Name&#160;of&#160;the&#160;Taxpayer</p>
								<p style="position:absolute;top:430px;left:327px;white-space:nowrap" class="ft1113">
												:<b>…………………………………………………..</b></p>
								<p style="position:absolute;top:420px;left:801px;white-space:nowrap" class="ft1116"><b>.</b></p>
								<p style="position:absolute;top:430px;left:811px;white-space:nowrap" class="ft1113">&#160;</p>
								<p style="position:absolute;top:460px;left:84px;white-space:nowrap" class="ft1125">&#160;<br />&#160;</p>
								<p style="position:absolute;top:484px;left:57px;white-space:nowrap" class="ft1113">
												2.&#160;&#160;NID/Passport&#160;No.&#160;(If&#160;No NID)&#160;: .&#160;……………………………….…..….......&#160;</p>
								<p style="position:absolute;top:515px;left:108px;white-space:nowrap" class="ft1113">&#160;</p>
								<p style="position:absolute;top:543px;left:162px;white-space:nowrap" class="ft1117">&#160;</p>
								<p style="position:absolute;top:548px;left:84px;white-space:nowrap" class="ft1117">&#160;</p>
								<p style="position:absolute;top:554px;left:54px;white-space:nowrap" class="ft1117">&#160;</p>
								<p style="position:absolute;top:564px;left:54px;white-space:nowrap" class="ft1113">&#160;&#160;</p>
								<p style="position:absolute;top:601px;left:54px;white-space:nowrap" class="ft1111">&#160;</p>
								<p style="position:absolute;top:617px;left:57px;white-space:nowrap" class="ft1113">4.&#160;</p>
								<p style="position:absolute;top:615px;left:84px;white-space:nowrap" class="ft1114">(</p>
								<p style="position:absolute;top:617px;left:93px;white-space:nowrap" class="ft1113">a)&#160;Circle:
												&#160;.........</p>
								<p style="position:absolute;top:611px;left:249px;white-space:nowrap" class="ft118"><b>54</b></p>
								<p style="position:absolute;top:617px;left:282px;white-space:nowrap" class="ft1113">
												..............&#160;(b)&#160;Taxes Zone: &#160;......</p>
								<p style="position:absolute;top:611px;left:574px;white-space:nowrap" class="ft118"><b>03</b></p>
								<p style="position:absolute;top:613px;left:607px;white-space:nowrap" class="ft1116"><b>.</b></p>
								<p style="position:absolute;top:617px;left:614px;white-space:nowrap" class="ft1113">....Chattogram</p>
								<p style="position:absolute;top:615px;left:752px;white-space:nowrap" class="ft1118">.………</p>
								<p style="position:absolute;top:617px;left:820px;white-space:nowrap" class="ft1113">&#160;</p>
								<p style="position:absolute;top:661px;left:84px;white-space:nowrap" class="ft1117">&#160;</p>
								<p style="position:absolute;top:668px;left:57px;white-space:nowrap" class="ft1111">&#160;</p>
								<p style="position:absolute;top:675px;left:57px;white-space:nowrap" class="ft1113">5.&#160;&#160;Total
												Income&#160;Shown&#160;&#160;&#160;&#160;TK.&#160;&#160;.................................................&#160;&#160;
								</p>
								<p style="position:absolute;top:712px;left:84px;white-space:nowrap" class="ft1111">&#160;</p>
								<p style="position:absolute;top:719px;left:57px;white-space:nowrap" class="ft1113">6.&#160;&#160;Total
												Tax&#160;Paid&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Tk.&#160;....................................................&#160;
								</p>
								<p style="position:absolute;top:746px;left:84px;white-space:nowrap" class="ft1113">&#160;</p>
								<p style="position:absolute;top:757px;left:90px;white-space:nowrap" class="ft110">&#160;</p>
								<p style="position:absolute;top:773px;left:57px;white-space:nowrap" class="ft1119"><b>&#160; &#160; &#160;
																&#160; &#160; &#160; &#160; &#160;&#160;</b></p>
								<p style="position:absolute;top:793px;left:69px;white-space:nowrap" class="ft1120"><b>Serial&#160;number of
																Return register&#160;</b></p>
								<p style="position:absolute;top:792px;left:406px;white-space:nowrap" class="ft1119"><b>&#160;</b></p>
								<p style="position:absolute;top:839px;left:69px;white-space:nowrap" class="ft1120"><b>Volume number of
																Return register&#160;</b></p>
								<p style="position:absolute;top:838px;left:406px;white-space:nowrap" class="ft1119"><b>&#160;</b></p>
								<p style="position:absolute;top:884px;left:69px;white-space:nowrap" class="ft1120"><b>Date of&#160;Return
																submission&#160;</b></p>
								<p style="position:absolute;top:882px;left:406px;white-space:nowrap" class="ft1119"><b>&#160;</b></p>
								<p style="position:absolute;top:926px;left:108px;white-space:nowrap" class="ft1126">&#160;<br />&#160;</p>
								<p style="position:absolute;top:961px;left:108px;white-space:nowrap" class="ft1111">&#160;</p>
								<p style="position:absolute;top:966px;left:108px;white-space:nowrap" class="ft1126">
												&#160;<br />&#160;<br />&#160;</p>
								<p style="position:absolute;top:1024px;left:76px;white-space:nowrap" class="ft116"><b>Seal of&#160;Tax
																Office</b></p>
								<p style="position:absolute;top:1023px;left:213px;white-space:nowrap" class="ft114">&#160; &#160; &#160;
												&#160; &#160;&#160; &#160; &#160; &#160;&#160;&#160;&#160; &#160;&#160; &#160; &#160;&#160;
												&#160;&#160;&#160; &#160; &#160; &#160;&#160;</p>
								<p style="position:absolute;top:1024px;left:398px;white-space:nowrap" class="ft116">
												<b>Signature&#160;and&#160;Seal of&#160;the Official Receiving the Return</b>
								</p>
								<p style="position:absolute;top:1023px;left:822px;white-space:nowrap" class="ft113"><b>&#160;</b></p>
								<p style="position:absolute;top:1044px;left:108px;white-space:nowrap" class="ft1127">
												<b>&#160;<br /></b>&#160;<br />&#160;<br />&#160;
								</p>
								<p style="position:absolute;top:365px;left:379px;white-space:nowrap" class="ft119">
												<b>2&#160;&#160;0&#160;&#160;2&#160;&#160;3&#160;&#160;-&#160;&#160;2&#160;&#160;0&#160;&#160;2&#160;&#160;4&#160;</b>
								</p>
								<p style="position:absolute;top:541px;left:181px;white-space:nowrap" class="ft1115"><b>8&#160;</b></p>
								<p style="position:absolute;top:541px;left:228px;white-space:nowrap" class="ft1115"><b>7&#160;</b></p>
								<p style="position:absolute;top:541px;left:275px;white-space:nowrap" class="ft1115"><b>4&#160;</b></p>
								<p style="position:absolute;top:541px;left:322px;white-space:nowrap" class="ft1115"><b>9&#160;</b></p>
								<p style="position:absolute;top:541px;left:369px;white-space:nowrap" class="ft1115"><b>5&#160;</b></p>
								<p style="position:absolute;top:541px;left:416px;white-space:nowrap" class="ft1115"><b>8&#160;</b></p>
								<p style="position:absolute;top:541px;left:460px;white-space:nowrap" class="ft1115"><b>6&#160;</b></p>
								<p style="position:absolute;top:541px;left:501px;white-space:nowrap" class="ft1115"><b>4&#160;</b></p>
								<p style="position:absolute;top:541px;left:542px;white-space:nowrap" class="ft1115"><b>9&#160;</b></p>
								<p style="position:absolute;top:541px;left:587px;white-space:nowrap" class="ft1115"><b>0&#160;</b></p>
								<p style="position:absolute;top:541px;left:636px;white-space:nowrap" class="ft1115"><b>2&#160;</b></p>
								<p style="position:absolute;top:541px;left:685px;white-space:nowrap" class="ft1115"><b>5&#160;</b></p>
								<p style="position:absolute;top:548px;left:55px;white-space:nowrap" class="ft1113">3</p>
								<p style="position:absolute;top:551px;left:67px;white-space:nowrap" class="ft114">.&#160;&#160;</p>
								<p style="position:absolute;top:548px;left:82px;white-space:nowrap" class="ft1113">TIN:</p>
								<p style="position:absolute;top:551px;left:129px;white-space:nowrap" class="ft114">&#160;</p>
								<p style="position:absolute;top:1160px;left:457px;white-space:nowrap" class="ft1122"><b>11&#160;</b></p>
				</div>
				@push('customJs')
								<script></script>
				@endpush
@endsection
