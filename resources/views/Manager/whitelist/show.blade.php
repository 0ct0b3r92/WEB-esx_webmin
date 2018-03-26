@extends('Manager.layouts.manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Candidature  #{{ $Whitelist->id }}</h1>
        </div>
    </div>


    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-user-profile">
                    <div class="profile-page-left">
                        <div class="row">

                            <div class="col-lg-12 mb-4">
                                <div class="profile-picture profile-picture-lg bg-gradient bg-primary mb-4">
                                    <img src="{{ $Whitelist->Member->avatar }}" width="144" height="144">
                                </div>

                            </div>

                            @if($Whitelist->status == 1)
                                <div class="col-sm-12">
                                    <a class="refuse btn btn-danger btn-block btn-gradient" data-user="{{ $Whitelist->Member->id }}" data-validateBy="{{ Auth::user()->id }}"
                                       data-toggle="tooltip" data-placement="top" title="Accepter par  {{ $Whitelist->Staff->username }}" >
                                        <i class="fa fa-times"></i> Refuser
                                    </a>
                                </div>
                            @elseif($Whitelist->status == 2)
                                <div class="col-sm-12">
                                    <a class="accepte btn btn-warning btn-block btn-gradient" data-user="{{ $Whitelist->Member->id }}" data-validateBy="{{ Auth::user()->id }}"
                                       data-toggle="tooltip" data-placement="top" title="Refusé par  {{ $Whitelist->Staff->username }}" >
                                        <i class="fa fa-check"></i> Accepter
                                    </a>
                                </div>
                            @else
                                <div class="col-sm-6">
                                    <a class="accepte btn btn-success btn-block btn-gradient" data-user="{{ $Whitelist->Member->id }}" data-validateBy="{{ Auth::user()->id }}">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="refuse btn btn-danger btn-block btn-gradient" data-user="{{ $Whitelist->Member->id }}" data-validateBy="{{ Auth::user()->id }}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            @endif

                        </div>

                    </div>
                    <div class="profile-page-center">
                        <h1 class="card-user-profile-name">{{ $Whitelist->Member->username }}</h1>
                        <div class="mailbox-container mailbox-message-view" data-email-id="1">
                            <div class="message-body-container">
                                <div class="message-body">
                                    {!! $Whitelist->history  !!}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop