@extends('layouts.main')

@section('content')

<div class="tab-pane container active" id="clients">
                <div class="container-fluid row" style="visibility:hidden; height:150px;">
                </div>
                <h1 style="font-family: Arial, Helvetica, sans-serif; margin-top: 30px; margin-bottom: 25px;">Clients</h1>

                <div class="container-fluid row align-center">
                <div class="col-10">
                <form method="post" class="d-flex mb-4" action="{{ route('clients.search') }}">
                        @method('POST')
                        @csrf 
                        <input class="form-control me-2 ms-3" placeholder="Search Clients" name="clientsSearch">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                </form>
                </div>
                <div class="col-2">
                    <form method="get" class="d-flex mb-4" action="{{ route('clients') }}">
                        @method('GET')
                        @csrf 
                    <button type="submit" class="btn btn-outline-success"> Show All</button>
                    </form>
                </div>
                </div>

                <div class="container-fluid" style="height:450px; overflow-x: scroll;">
                    <ul style="list-style-type: none; white-space: nowrap;">
                      <?php $i = 0; ?>
                        @foreach($clients as $client) 
                        @if($i % 2 == 0)
                        
                        <li style="display: inline-block; margin-right: 25px; vertical-align: top;">
                            <div class="card" style="width:400px; height:400px;">
                                <img class="card-img-top" src="{{ $client->imageReference }}" alt="Card image" style="width:350px;height:auto;margin: auto;">
                                <div class="card-body">
                                  <h4 class="card-title">{{ $client->businessName }}</h4>
                                  <p class="card-text" style="width:390px;"><?php echo $client->description ?></p>
                                  <a href="{{ $client->moreInfoLink }}" class="btn btn-primary" target="_blank">Learn More</a>
                                </div>
                              </div>
                        </li>
                        @else 
                        <li style="display: inline-block; margin-right: 25px; vertical-align: top;">
                            <div class="card" style="width:400px; height:400px;">
                                <div class="card-body">
                                  <h4 class="card-title">{{ $client->businessName }}</h4>
                                  <p class="card-text"><?php echo $client->description ?></p>
                                  <a href="{{ $client->moreInfoLink }}" class="btn btn-primary" target="_blank">Learn More</a>
                                </div>
                                <img class="card-img-bottom" src="{{ $client->imageReference }}" alt="Card image" style="width:330px;height:auto;margin:auto;">
                              </div>
                        </li>
                        @endif
                        <?php $i++; ?>
                        @endforeach

                        @if (count($clients)%2 == 0) 
                        <li style="display: inline-block; margin-right: 25px; vertical-align: top;">
                            <div class="card" style="width:400px; height:400px;">
                              <img class="card-img-bottom" src="Images/partnerLogo.png" alt="Card image" style="width:350px;height:auto;margin: auto;">
                                <div class="card-body">
                                  <h4 class="card-title">Be our next partner</h4>
                                  <p class="card-text">You can be our next partner, if you need more <br>information contact us.</p>
                                  <a href="{{ route('contact') }}" class="btn btn-primary">Contact</a>
                                </div>
                              </div>
                        </li>
                        @else
                        <li style="display: inline-block; margin-right: 25px; vertical-align: top;">
                            <div class="card" style="width:400px; height:400px;">
                                <div class="card-body">
                                  <h4 class="card-title">Be our next partner</h4>
                                  <p class="card-text">You can be our next partner, if you need more <br>information contact us.</p>
                                  <a href="{{ route('contact') }}" class="btn btn-primary">Contact</a>
                                </div>
                                <img class="card-img-bottom" src="Images/partnerLogo.png" alt="Card image" style="width:350px;height:auto;margin: auto;">
                              </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="container-fluid">
                    <h2 id="whyus" style="font-family: Arial, Helvetica, sans-serif; margin-top: 30px;">Why us?</h2>
                    <p style="text-indent: 40px;">
                            Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. 
                    </p>
                    <p style="text-indent: 40px;">
                            Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. 
                    </p>
                    <p style="text-indent: 40px;">
                            We work with marketing and comms teams and agencies for organisations 
                        including, businesses, not-for-profits, schools, IWI, government and 
                        retailers. The one thing they all have in common; we help them to succeed 
                        online.
                    </p>
                </div>
                <div class="container-fluid">
                    <h2 id="whoweworkwith" style="font-family: Arial, Helvetica, sans-serif; margin-top: 60px; margin-bottom: 30px;">Who we work with</h2>
                    <dl style="list-style-type: bullet;">
                        <dt style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; margin-top: 30px;">Startups</dt>
                        <dd style="text-indent: 40px;">
                            Hundreds of businesses have trusted Meta with their website design, 
                            development and online marketing strategy. Why? Because we produce real results 
                            – more customers, increased sales, better conversion rates and a true return on 
                            investment. The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.
                        </dd>
                        <dt style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; margin-top: 30px;">Non-profit Organizations</dt>
                        <dd style="text-indent: 40px;">
                            The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.
                        </dd>
                        <dt style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; margin-top: 30px;">Schools and Universities</dt>
                        <dd style="text-indent: 40px;">
                            The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.
                        </dd>
                        <dt style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; margin-top: 30px;">Government Agencies</dt>
                        <dd style="text-indent: 40px;">
                            Hundreds of businesses have trusted Meta with their website design, 
                            development and online marketing strategy. Why? Because we produce real results 
                            – more customers, increased sales, better conversion rates and a true return on 
                            investment. The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.
                        </dd>
                        <dt style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; margin-top: 30px;">Software Developers</dt>
                        <dd style="text-indent: 40px;">
                            The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.
                        </dd>
                        <dt style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; margin-top: 30px;">Banks</dt>
                        <dd style="text-indent: 40px;">
                            The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.The team enables staff to manage their own website content, build awareness, 
                            increase donations and present themselves to a wider audience. Clients include 
                            GirlGuiding New Zealand, Caritas Aotearoa, Christian World Services and Home & 
                            Family.
                        </dd>
                      </dl>
                </div>
                <div class="container-fluid">
                    <h2 id="whatwelookfor" style="font-family: Arial, Helvetica, sans-serif; margin-top: 60px;">What we look for</h2>
                    <p style="text-indent: 40px;">
                            Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. 
                    </p>
                    <p style="text-indent: 40px;">
                            Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. Good client fit is important to us. In order to forge the best 
                        relationships, we like to take some time to get to know you. It’s 
                        part of our process. Our collaborative approach means that we forge 
                        a working partnership that ensures we are on the same page and working
                        together to achieve your objectives. 
                    </p>
                    <p style="text-indent: 40px;">
                            We work with marketing and comms teams and agencies for organisations 
                        including, businesses, not-for-profits, schools, IWI, government and 
                        retailers. The one thing they all have in common; we help them to succeed 
                        online.
                    </p>
                </div>
            </div>

@endsection