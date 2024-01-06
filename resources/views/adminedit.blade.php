@extends('layouts.main')

@section('content')

<div class="tab-pane container active" id="clients">
                <div class="container-fluid row" style="visibility:hidden; height:150px;">
                </div>
                @if(session()->has('messageDelete'))
                <div class="alert alert-success">
                <p>{{ session('messageDelete') }}</p>
            </div>
            @endif

            @if(session()->has('messageAdd'))
            <div class="alert alert-success">
                <p>{{ session('messageAdd') }}</p>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

                <h1 style="font-family: Arial, Helvetica, sans-serif; margin-top: 30px; margin-bottom: 25px;">Edit Clients</h1>

                <div class="container-fluid row align-center">
                <div class="col-10">
                <form method="post" class="d-flex mb-4" action="{{ route('edit.search.clients') }}">
                        @method('POST')
                        @csrf 
                        <input class="form-control me-2 ms-3" placeholder="Search Clients" name="clientsSearch">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                </form>
                </div>
                <div class="col-2">
                    <form method="get" class="d-flex mb-4" action="{{ route('edit') }}">
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
                                  <form method="post" action="{{ route('edit.delete.clients', ['id' => $client]) }}">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-close block" style="float:Left;" onclick="return confirm('Are you sure?')"></button>
                                    <p class="block text-danger" style="float:Left;">Delete</p>
                                    </form>
                                </div>
                              </div>
                        </li>
                        @else 
                        <li style="display: inline-block; margin-right: 25px; vertical-align: top;">
                            <div class="card" style="width:400px; height:400px;">
                                <div class="card-body">
                                  <h4 class="card-title">{{ $client->businessName }}</h4>
                                  <p class="card-text"><?php echo $client->description ?></p>
                                  <form method="post" action="{{ route('edit.delete.clients', ['id' => $client]) }}">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-close block" style="float:Left;" onclick="return confirm('Are you sure?')"></button>
                                    <p class="block text-danger" style="float:Left;">Delete</p>
                                    </form>
                                </div>
                                <img class="card-img-bottom" src="{{ $client->imageReference }}" alt="Card image" style="width:330px;height:auto;margin:auto;">
                              </div>
                        </li>
                        @endif
                        <?php $i++; ?>
                        @endforeach

                        <li style="display: inline-block; margin-right: 25px; vertical-align: top;">
                            <div class="card" style="width:400px; height:400px;">
                                <div class="card-body">
                                  <h4 class="card-title">Add New Client</h4>
                                  <form method="post" action="{{ route('edit.add.clients') }}" enctype="multipart/form-data">
                                    @csrf 
                                    @method('POST')
                                    <label for="businessName">Business Name:</label>
                                    <input class="form-control me-3 ms-1" name="businessName">
                                    <label for="description">Short Description:</label>
                                    <input class="form-control me-3 ms-1" name="description">
                                    <label for="moreInfoLink">More Information Link:</label>
                                    <input class="form-control me-3 ms-1" name="moreInfoLink">
                                    <label for="imageReference">Upload Logo Image:</label>
                                    <input type="file" class="form-control me-3 ms-1" name="imageReference">
                                    <button type="submit" class="btn btn-outline-success mt-3">Add</button>
                                  </form>
                                </div>
                              </div>
                        </li>
                    </ul>
                </div>

                <h1 style="font-family: Arial, Helvetica, sans-serif; margin-top: 30px; margin-bottom: 25px;">Edit Frequently Asked Questions</h1>
                <div class="accordion" id="accordionFAQ">
                  @foreach ($faq as $faqItem) 
                    <div class="accordion-item">
                    <form method="post" action="{{ route('edit.delete.faq', ['id' => $faqItem]) }}">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn-close block" style="float:Left;" onclick="return confirm('Are you sure?')"></button>
                        <p class="block text-danger" style="float:Left;">Delete</p>
                    </form>
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q{{ $faqItem->id }}" aria-expanded="false" aria-controls="#q{{ $faqItem->id }}">
                          <?php echo $faqItem->question ?>
                        </button>
                      </h2>
                      <div id="q{{ $faqItem->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                         <?php  echo $faqItem->answer ?>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#edit" aria-expanded="false" aria-controls="#edit">
                          <?php echo 'Add New FAQ' ?>
                        </button>
                      </h2>
                      <div id="edit" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                        <form method="post" action="{{ route('edit.add.faq') }}">
                                    @csrf 
                                    @method('POST')
                                    <label for="question">Question:</label>
                                    <input class="form-control me-3 ms-1" name="question">
                                    <label for="answer">Answer:</label>
                                    <input class="form-control me-3 ms-1" name="answer">
                                    <button type="submit" class="btn btn-outline-success mt-3">Add</button>
                                  </form>
                        </div>
                      </div>
                    </div>
                  <div class="container-fluid row" style="visibility:hidden; height:150px;">
                </div>
            </div>

@endsection