@extends('layouts.app')

@section('content')
    <div class="messenger">
        <div class="messenger-sidebar">
            <div class="messenger-sidebar-header">
                <div class="position-relative w-100">
                    <button type="submit" class="btn position-absolute top-0 text-body"><i
                            class="fa fa-search"></i></button>
                    <input type="text" class="form-control rounded-pill ps-35px" placeholder="Search Messenger">
                </div>
            </div>
            <div class="messenger-sidebar-body">
                <div data-scrollbar="true" data-height="100%" style="height: 100%;" class="ps ps--active-y">
                    <div class="messenger-item">
                        <a href="#" data-toggle="messenger-content" class="messenger-link active">
                            <div class="messenger-media bg-theme text-theme-color rounded-pill fs-20px fw-bold">
                                <i class="fa fa-robot"></i>
                            </div>
                            <div class="messenger-info">
                                <div class="messenger-name">Cohort 3 Group</div>
                                <div class="messenger-text">Roberto says Hey Gabe, can you forward me the meeting notes?
                                </div>
                            </div>
                            <div class="messenger-time-badge">
                                <div class="messenger-time">13:02</div>
                                <div class="messenger-badge">2</div>
                            </div>
                        </a>
                    </div>
                    <div class="messenger-item">
                        <a href="#" data-toggle="messenger-content" class="messenger-link">
                            <div class="messenger-media">
                                <img alt="" src="assets/img/user/user-2.jpg" class="mw-100 mh-100 rounded-pill">
                            </div>
                            <div class="messenger-info">
                                <div class="messenger-name">Baalazumah Alice</div>
                                <div class="messenger-text">Say hello to Alice</div>
                            </div>
                            <div class="messenger-time-badge">
                                <div class="messenger-time">14:59</div>
                                <div class="messenger-badge">1</div>
                            </div>
                        </a>
                    </div>
                    <div class="messenger-item">
                        <a href="#" data-toggle="messenger-content" class="messenger-link">
                            <div class="messenger-media">
                                <img alt="" src="assets/img/user/user-3.jpg" class="mw-100 mh-100 rounded-pill">
                            </div>
                            <div class="messenger-info">
                                <div class="messenger-name">Issahaku Zulaiha</div>
                                <div class="messenger-text"><b>Daniela:</b> Wow, almost 2,500 members!</div>
                            </div>
                            <div class="messenger-time-badge">
                                <div class="messenger-time">14:42</div>
                                <div class="messenger-badge empty"></div>
                            </div>
                        </a>
                    </div>
                    <div class="messenger-item">
                        <a href="#" data-toggle="messenger-content" class="messenger-link">
                            <div class="messenger-media">
                                <img alt="" src="assets/img/user/user-4.jpg" class="mw-100 mh-100 rounded-pill">
                            </div>
                            <div class="messenger-info">
                                <div class="messenger-name">Akolgo Beatrice</div>
                                <div class="messenger-text">I just finished installing an AC.</div>
                            </div>
                            <div class="messenger-time-badge">
                                <div class="messenger-time">14:40</div>
                                <div class="messenger-badge empty"></div>
                            </div>
                        </a>
                    </div>
                    <div class="messenger-item">
                        <a href="#" data-toggle="messenger-content" class="messenger-link">
                            <div class="messenger-media">
                                <img alt="" src="assets/img/user/user-5.jpg" class="mw-100 mh-100 rounded-pill">
                            </div>
                            <div class="messenger-info">
                                <div class="messenger-name">Chonwie Wiisi Kanton</div>
                                <div class="messenger-text"><b>Monika Parker:</b> Poll</div>
                            </div>
                            <div class="messenger-time-badge">
                                <div class="messenger-time">12:45</div>
                                <div class="messenger-badge empty"></div>
                            </div>
                        </a>
                    </div>
                    <div class="messenger-item">
                        <a href="#" data-toggle="messenger-content" class="messenger-link">
                            <div class="messenger-media">
                                <img alt="" src="assets/img/user/user-6.jpg" class="mw-100 mh-100 rounded-pill">
                            </div>
                            <div class="messenger-info">
                                <div class="messenger-name">Mwintomeh Sylvia</div>
                                <div class="messenger-text">I got a job at NASA!</div>
                            </div>
                            <div class="messenger-time-badge">
                                <div class="messenger-time">12:45</div>
                                <div class="messenger-badge empty"></div>
                            </div>
                        </a>
                    </div>


                    <div class="messenger-item">
                        <a href="#" data-toggle="messenger-content" class="messenger-link">
                            <div class="messenger-media">
                                <img alt="" src="assets/img/user/user-1.jpg" class="mw-100 mh-100 rounded-pill">
                            </div>
                            <div class="messenger-info">
                                <div class="messenger-name">April</div>
                                <div class="messenger-text">Yes or yes? ;)</div>
                            </div>
                            <div class="messenger-time-badge">
                                <div class="messenger-time">08:22</div>
                                <div class="messenger-badge empty"></div>
                            </div>
                        </a>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 828px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 780px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="messenger-content">
            <div class="messenger-content-header">
                <div class="messenger-content-header-mobile-toggler">
                    <a href="#" data-toggle="messenger-content" class="me-2">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </div>
                <div class="messenger-content-header-media">
                    <div class="media bg-theme text-theme-color rounded-pill fs-20px fw-bold">
                        <i class="fi fi-rr-air-conditioner"></i>
                    </div>
                </div>
                <div class="messenger-content-header-info">
                    Cohort 3 Group - Aircondition Installation & Repairs
                    <small>10 members</small>
                </div>
                <div class="messenger-content-header-btn">
                    <a href="#" class="btn btn-link"><i class="fa fa-search"></i></a>
                    <div class="dropdown">
                        <a href="#" class="btn btn-link" data-bs-toggle="dropdown"><i class="fa fa-ellipsis"></i></a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item d-flex align-items-center"><i
                                    class="fa fa-pencil my-n1 me-3"></i> Edit</a>
                            <a href="#" class="dropdown-item d-flex align-items-center"><i
                                    class="fa fa-info-circle my-n1 me-3"></i> Info</a>
                            <a href="#" class="dropdown-item d-flex align-items-center"><i
                                    class="fa fa-bell my-n1 me-3"></i> Mute</a>
                            <a href="#" class="dropdown-item d-flex align-items-center"><i
                                    class="fa fa-circle-xmark fs-5 my-n1 me-3"></i> Clear chat history</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item d-flex align-items-center"><i
                                    class="fa fa-trash fs-5 my-n1 me-3"></i> Delete and leave</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="messenger-content-body">
                <div data-scrollbar="true" data-height="100%" style="height: 100%;" class="ps ps--active-y">
                    <div class="widget-chat">
                        <div class="widget-chat-date">YESTERDAY</div>
                        <div class="widget-chat-item">
                            <div class="widget-chat-media"><img src="assets/img/user/user-4.jpg" alt=""></div>
                            <div class="widget-chat-content">
                                <div class="widget-chat-name">Akolgo Beatrice</div>
                                <div class="widget-chat-message last">
                                    Hey folks, I just finished installing an AC!
                                </div>
                                <div class="widget-chat-status">Yesterday 3:25PM</div>
                            </div>
                        </div>
                        <div class="widget-chat-item">
                            <div class="widget-chat-media"><img src="assets/img/user/user-5.jpg" alt=""></div>
                            <div class="widget-chat-content">
                                <div class="widget-chat-name">Kanton Sylvia</div>
                                <div class="widget-chat-message last">
                                    Congrats Beatrice! How difficult was it to install?
                                </div>
                                <div class="widget-chat-status">Yesterday 3:27PM</div>
                            </div>
                        </div>
                        <div class="widget-chat-item">
                            <div class="widget-chat-media"><img src="assets/img/user/user-6.jpg" alt=""></div>
                            <div class="widget-chat-content">
                                <div class="widget-chat-name">Akolgo Beatrice</div>
                                <div class="widget-chat-message last">
                                    Was it a DIY project or did you hire someone to do it for you?
                                </div>
                                <div class="widget-chat-status">Yesterday 3:30PM</div>
                            </div>
                        </div>
                        <div class="widget-chat-date">TODAY</div>
                        <div class="widget-chat-item">
                            <div class="widget-chat-media"><img src="assets/img/user/user-1.jpg" alt=""></div>
                            <div class="widget-chat-content">
                                <div class="widget-chat-name">Kanton Sylvia</div>
                                <div class="widget-chat-message last">
                                    Hey, I'm thinking of installing an AC. Does anyone have any tips?
                                </div>
                                <div class="widget-chat-status">2:21PM</div>
                            </div>
                        </div>
                        <div class="widget-chat-item reply">
                            <div class="widget-chat-content">
                                <div class="widget-chat-message last">
                                    Yes, I have some tips. What kind of AC are you looking for?
                                </div>
                                <div class="widget-chat-status">2:22PM</div>
                            </div>
                        </div>
                        <div class="widget-chat-item">
                            <div class="widget-chat-media"><img src="assets/img/user/user-2.jpg" alt=""></div>
                            <div class="widget-chat-content">
                                <div class="widget-chat-name">Akolgo Beatrice</div>
                                <div class="widget-chat-message last">
                                    I'm looking for a split type AC. Any recommendations?
                                </div>
                                <div class="widget-chat-status">2:25PM</div>
                            </div>
                        </div>
                        <div class="widget-chat-item reply">
                            <div class="widget-chat-content">
                                <div class="widget-chat-message last">
                                    I would recommend getting a 1.5 ton AC. It should be enough for a small room.
                                </div>
                                <div class="widget-chat-status">2:27PM</div>
                            </div>
                        </div>
                        <div class="widget-chat-item">
                            <div class="widget-chat-media"><img src="assets/img/user/user-1.jpg" alt=""></div>
                            <div class="widget-chat-content">
                                <div class="widget-chat-name">Kanton Sylvia</div>
                                <div class="widget-chat-message last">
                                    Hey Gabe, thanks for the tip. I'll look into it.
                                </div>
                                <div class="widget-chat-status">4:30PM</div>
                            </div>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: -81px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 81px; height: 760px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 74px; height: 686px;"></div>
                    </div>
                </div>
            </div>
            <div class="messenger-content-footer">
                <div class="input-group position-relative">
                    <button class="btn border-0 position-absolute top-0 bottom-0 start-0 z-2 text-body" id="trigger"><i
                            class="far fa-face-smile"></i></button>
                    <input type="text" class="form-control rounded-start ps-45px z-1" id="input"
                        placeholder="Write a message...">
                    <button class="btn btn-theme fs-13px fw-semibold" type="button">Send <i
                            class="fa fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection
