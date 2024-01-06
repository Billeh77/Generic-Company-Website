@extends('layouts.main')

@section('content')

<div class="tab-pane container active" id="todolist">
                <div class="container-fluid row" style="visibility:hidden; height:150px;">
                </div>
                <h1 style="font-family: Arial, Helvetica, sans-serif; margin-top: 30px; margin-bottom: 25px;">To Do List
                 <span class="badge bg-danger">
                  {{ \Auth::user()->tasks->count() }}
              </span>
            </h1>
            @if(session()->has('messageDelete'))
              <section class="popup">
                <div class="popup-inner">
                  <div class="popup-content">
                    <div class="content text-center">
                      <p class="text-success">{{ session('messageDelete') }}</p>
                    </div>
                  </div>
                </div>
              </section>
            @endif

            @if(session()->has('messageAdd'))
              <section class="popup">
                <div class="popup-inner">
                  <div class="popup-content">
                    <div class="content text-center">
                      <p class="text-success">{{ session('messageAdd') }}</p>
                    </div>
                  </div>
                </div>
              </section>
            @endif
              
                <form method="post" action="{{ route('addTask') }}">
                  @method('POST')
                  @csrf
                <div class="input-group" style="margin-bottom: 25px;">
                    
                <button type="submit" class="btn">
                    <span class="input-group-text" id="addtask">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            ::before
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                        </svg>
                    </span>
                    </button>
                    <input type="text" class="form-control" placeholder="Add Task" aria-label="Add Task" area-describedby="task" name="task">
                </div>
                </form>
                <div id="taskContainer">
                  @foreach (\Auth::user()->tasks as $task) 
                    <div class="alert alert-success alert-dismissible show">
                      <form method="post" action="{{ route('deleteTask',[ 'id' => $task ]) }}">
                        @csrf 
                        @method('DELETE')
                      <button type="submit" class="btn-close"></button>
                      {{ $task->task }}
                      </form>
                    </div>
                  @endforeach
                </div>
            </div>

@endsection