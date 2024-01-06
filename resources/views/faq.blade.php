@extends('layouts.main')

@section('content')

<div class="tab-pane container active" id="faq">
                <div class="container-fluid row" style="visibility:hidden; height:150px;">
                </div>
                <h1 style="font-family: Arial, Helvetica, sans-serif; margin-top: 30px; margin-bottom: 25px;">Frequently Asked Questions</h1>
                <div class="accordion" id="accordionFAQ">
                  @foreach ($faq as $faqItem) 
                    <div class="accordion-item">
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
            </div>

@endsection