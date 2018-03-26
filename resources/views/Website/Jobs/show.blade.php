@extends('Website.layouts.master')

@section('body-class','single-match-page single-team-page')

@section('title','Entreprise ' . $job->label)

@section("content")

    @include('Website.layouts.tickers')

    <div class="container-fluid main-slider no-padding">
        <div class="slider">
            <div class="container">
                <div class="team-a team-b">
                    <div class="team-title" style="width: 170px"><h1>{{$job->label}}</h1></div>
                    <div class="team-img">
                        <a><img src="{{ $job->image }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top-divider"></div>

    <!-- page content wrapper -->
    <section class="content-wrapper container-fluid no-padding">

        <div class="container-fluid no-padding">
            <ul class="nav nav-tabs team-nav">
                <li class="active">
                    <a href="#team" data-toggle="tab">
                        <i class="fa fa-info-circle"></i>&nbsp;Information
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#members_tab">
                        <i class="fa fa-users"></i> Employé
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#matches-tab">
                        <i class="fa fa-file-archive-o"></i> Déposer mon C.V
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active container" id="team">

                    <div class="main-content col-lg-8">
                        <!-- content title -->
                        <div class="main-content-title">
                            <h3><i class="fa fa-info-circle"></i> Information sur l'emploi</h3>
                        </div>
                        <div class="blog-content">
                            <blockquote> Description de l'emploi sous peux </blockquote>
                        </div>
                    </div>
                    <div class="sidebar col-lg-4">

                        <div class="team-info-wrapper">
                            <div class="team-info-members">
                                <i class="fa fa-users"></i>
                                <strong> {{ $job->Players->count() }}&nbsp; Employé</strong>
                            </div>
                            <ul class="team-info-location">
                                @if($job->Boss)
                                <li><strong>{{ $job->Boss->JobGrade->label}} &nbsp;</strong> {{ $job->Boss->Fullname }}</li>
                                @else
                                    <li class="text-center">Entreprise sans patron</li>
                                @endif

                            </ul>

                        </div>

                    </div>
                </div>

                <div class="tab-pane  container" id="members_tab">
                    <div class="col-lg-12 no-padding">
                        <ul class="teams-list">

                            @foreach($job->Players as $player)
                            <li class="single-team">
                                <div class="team-avatar"><a href=""><img src="{{ isset($player->Member) ? $player->Member->image : asset('img/jobs/no-image.png') }}"></a></div>
                                <div class="team-info">
                                    <a href="" class="team-title">{{ isset($player->Fullname) ? $player->Fullname : $player->username }}</a>
                                    <span class="members">{{ $player->JobGrade->label }}</span>
                                </div>

                                @if($job->Boss != null && $job->Boss->identifier == $player->identifier)
                                <div class="is-admin" data-toggle="tooltip" data-placement="top" title="Patron" >
                                    <i class="fa-star fa" ></i>
                                </div>
                                @endif

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tab-pane container" id="matches-tab">

                    <div class="main-content col-lg-8">
                        <!-- content title -->

                        <div class="main-content-title">
                            <h3><i class="fa fa-newspaper-o"></i> team discussion</h3>
                        </div>

                        <form id="commentform">

                            <div class="form-section">
                                <input id="author" name="author" placeholder="Name*" type="text" value="" size="30" maxlength="20" tabindex="3">
                            </div>
                            <div class="form-section">
                                <input placeholder="Email*" id="email" name="email" type="text" value="" size="30" maxlength="50" tabindex="4">
                            </div>
                            <div class="form-section">
                                <input id="url" placeholder="Website" name="url" type="text" value="" size="30" maxlength="50" tabindex="5">
                            </div>
                            <div class="form-section">
                                <textarea placeholder="Leave a comment..." id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea>
                            </div>
                            <div class="form-submit">
                                <input id="submit" name="submit" class="button-small button-green" type="submit" value="Submit comment" tabindex="7">
                            </div>
                        </form>

                    </div>
                    <div class="sidebar col-lg-4">

                        <div class="team-info-wrapper">
                            <div class="team-info-members">
                                <i class="fa fa-users"></i>
                                <strong> {{ $job->Players->count() }}&nbsp; Employé</strong>
                            </div>
                            <ul class="team-info-location">
                                @if($job->Boss)
                                    <li><strong>{{ $job->Boss->JobGrade->label}} &nbsp;</strong> {{ $job->Boss->Fullname }}</li>
                                @else
                                    <li class="text-center">Entreprise sans patron</li>
                                @endif


                            </ul>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection