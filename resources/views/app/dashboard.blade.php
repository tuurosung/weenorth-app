@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-body p-4 pb-0" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: -24px -24px 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                            style="height: auto; overflow: hidden;">
                            <div class="simplebar-content" style="padding: 24px 24px 0px;">
                                <div class="row flex-nowrap">
                                    <div class="col">
                                        <x-cards.colour-card colour="primary" icon="users" value="2066" label="Members" />
                                    </div>
                                    <div class="col">
                                        <x-cards.colour-card colour="warning" icon="hammer-brush" value="105" label="Service Requests" />
                                    </div>
                                    <div class="col">
                                        <x-cards.colour-card colour="secondary" icon="warehouse-alt" value="12" label="Upcoming Events" />
                                    </div>
                                    <div class="col">
                                        <x-cards.colour-card colour="danger" icon="" value="0" label="Regions" />
                                    </div>
                                    <div class="col">
                                        <x-cards.colour-card colour="success" icon="" value="0" label="Districts" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 1140px; height: 279px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm" style="min-height: 500px">
                <div class="card-body">
                    <h4 class="card-title">Service Requests</h4>
                </div>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm" style="min-height: 500px">
                <div class="card-body">
                    <h4 class="card-title">Upcoming Events</h4>
                </div>
            </div>
        </div>
    </div>

@endsection
