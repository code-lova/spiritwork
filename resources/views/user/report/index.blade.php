@extends('layouts.user.user_layout')

@section('title', "$settings->title")
@section('meta_description', "$settings->site_description")
@section('meta_keyword', "$settings->keywords")
@section('website_name', "$settings->site_name")


@section('content')


    <style>
        .action-links {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 10px;
        }

        .action-links a {
            display: inline-flex;
            align-items: center;
            color: #062a50;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .action-links a svg {
            margin-right: 5px;
            fill: #032c58;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        /* Center the pagination */
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        /* Style the pagination links */
        .page-link {
            color: #ff8c42; /* light orange text */
            font-size: 1.2rem; /* increase size */
            padding: 0.6rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #ffbb80;
        }

        /* Style on hover */
        .page-link:hover {
            background-color: #ffe0c2;
            color: #d95f00;
        }

        /* Style the active page */
        .page-item.active .page-link {
            background-color: #ff8c42;
            border-color: #ff8c42;
            color: white;
        }

        .attachment-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            font-weight: 600;
            color: #f7931e;
            text-decoration: none;
            margin-top: 5px;
        }

        .attachment-link:hover {
            text-decoration: underline;
            color: #d57800;
        }

    </style>

    <!--===== HERO AREA STARTS =======-->
    <div class="inner-header-area">
        <div class="containe-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="inner-header heading1">
                        <h2>{{ $title }}</h2>
                        <div class="space28"></div>
                        <p><a href="{{ route('user.dashboard') }}">Home</a> <svg xmlns="http://www.w3.org/2000/svg"
                                width="9" height="16" viewBox="0 0 9 16" fill="none">
                                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg> {{ $subtitle }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-images">
                        <img src="{{ asset('uploads/about/' . $about->banner_img) }}" alt="{{ $settings->site_name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->
    <div class="space30"></div>
    <!--===== DASHBOARD AREA STARTS =======-->
    <div class="dashboard-message">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{ ' ' }}Sent Reports</h3>
                    <div class="space40"></div>
                    <div class="dashboard-info-sider-deatils">
                        <div class="dashboard-info-sider">
                            @forelse ($reports as $report)

                                <div class="space40"></div>

                                <div class="message-boxarea">
                                    <div class="img1">
                                        <img src="{{ asset('assets/img/profile.webp') }}" alt="housa">
                                    </div>
                                    <div class="conatent-area">
                                        <div class="content">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14.8046 13.12C14.8046 14.1128 14.0034 14.914 13.0106 14.914H4.0792C3.0864 14.914 2.28516 14.1128 2.28516 13.12V4.18857C2.28516 3.19577 3.0864 2.39453 4.0792 2.39453H6.041V1.77481C6.04201 1.62752 6.09392 1.4851 6.18792 1.3717C6.28193 1.2583 6.41225 1.18089 6.5568 1.15259L6.66697 1.14258C7.01251 1.14258 7.29295 1.4105 7.29295 1.77481V2.39453H9.79684V1.77481C9.79785 1.62752 9.84976 1.4851 9.94377 1.3717C10.0378 1.2583 10.1681 1.18089 10.3126 1.15259L10.4228 1.14258C10.7684 1.14258 11.0488 1.4105 11.0488 1.77481V2.39453H13.0106C14.0034 2.39453 14.8046 3.19577 14.8046 4.18857V13.12ZM3.5371 6.15037V12.8233C3.5371 13.2865 3.91269 13.6621 4.37591 13.6621H12.7139C13.1771 13.6621 13.5527 13.2865 13.5527 12.8233V6.15037H3.5371ZM5.41503 11.1582C5.72175 11.1582 5.9784 11.3873 6.03098 11.674L6.041 11.7841C6.041 12.0909 5.81189 12.3475 5.5252 12.4001L5.41503 12.4101C5.24951 12.4085 5.09124 12.342 4.9742 12.225C4.85716 12.1079 4.79068 11.9496 4.78905 11.7841C4.78905 11.4774 5.01816 11.2208 5.30486 11.1682L5.41503 11.1582ZM8.5449 11.1582C8.85162 11.1582 9.10827 11.3873 9.16085 11.674L9.17087 11.7841C9.17087 12.0909 8.94176 12.3475 8.65507 12.4001L8.5449 12.4101C8.37938 12.4085 8.22111 12.342 8.10407 12.225C7.98703 12.1079 7.92055 11.9496 7.91892 11.7841C7.91892 11.4774 8.14803 11.2208 8.43472 11.1682L8.5449 11.1582ZM11.6748 11.1582C11.9815 11.1582 12.2381 11.3873 12.2907 11.674L12.3007 11.7841C12.3007 12.0909 12.0716 12.3475 11.7849 12.4001L11.6748 12.4101C11.5093 12.4085 11.351 12.342 11.2339 12.225C11.1169 12.1079 11.0504 11.9496 11.0488 11.7841C11.0488 11.4774 11.2779 11.2208 11.5646 11.1682L11.6748 11.1582ZM5.41503 9.28024C5.72175 9.28024 5.9784 9.50935 6.03098 9.79604L6.041 9.90621C6.041 10.2129 5.81189 10.4696 5.5252 10.5222L5.41503 10.5322C5.24951 10.5306 5.09124 10.4641 4.9742 10.347C4.85716 10.23 4.79068 10.0717 4.78905 9.90621C4.78905 9.59949 5.01816 9.34284 5.30486 9.29026L5.41503 9.28024ZM8.5449 9.28024C8.85162 9.28024 9.10827 9.50935 9.16085 9.79604L9.17087 9.90621C9.17087 10.2129 8.94176 10.4696 8.65507 10.5222L8.5449 10.5322C8.37938 10.5306 8.22111 10.4641 8.10407 10.347C7.98703 10.23 7.92055 10.0717 7.91892 9.90621C7.91892 9.59949 8.14803 9.34284 8.43472 9.29026L8.5449 9.28024ZM11.6748 9.28024C11.9815 9.28024 12.2381 9.50935 12.2907 9.79604L12.3007 9.90621C12.3007 10.2129 12.0716 10.4696 11.7849 10.5222L11.6748 10.5322C11.5093 10.5306 11.351 10.4641 11.2339 10.347C11.1169 10.23 11.0504 10.0717 11.0488 9.90621C11.0488 9.59949 11.2779 9.34284 11.5646 9.29026L11.6748 9.28024ZM5.41503 7.40232C5.72175 7.40232 5.9784 7.63142 6.03098 7.91812L6.041 8.02829C6.041 8.33502 5.81189 8.59167 5.5252 8.64425L5.41503 8.65427C5.24951 8.65264 5.09124 8.58616 4.9742 8.46912C4.85716 8.35208 4.79068 8.19381 4.78905 8.02829C4.78905 7.72156 5.01816 7.46492 5.30486 7.41233L5.41503 7.40232ZM8.5449 7.40232C8.85162 7.40232 9.10827 7.63142 9.16085 7.91812L9.17087 8.02829C9.17087 8.33502 8.94176 8.59167 8.65507 8.64425L8.5449 8.65427C8.37938 8.65264 8.22111 8.58616 8.10407 8.46912C7.98703 8.35208 7.92055 8.19381 7.91892 8.02829C7.91892 7.72156 8.14803 7.46492 8.43472 7.41233L8.5449 7.40232ZM11.6748 7.40232C11.9815 7.40232 12.2381 7.63142 12.2907 7.91812L12.3007 8.02829C12.3007 8.33502 12.0716 8.59167 11.7849 8.64425L11.6748 8.65427C11.5093 8.65264 11.351 8.58616 11.2339 8.46912C11.1169 8.35208 11.0504 8.19381 11.0488 8.02829C11.0488 7.72156 11.2779 7.46492 11.5646 7.41233L11.6748 7.40232ZM3.5371 4.89842H13.5527V4.48528C13.5527 4.02206 13.1771 3.64647 12.7139 3.64647H4.37591C3.91269 3.64647 3.5371 4.02206 3.5371 4.48528V4.89842Z"
                                                        fill="#424242" />
                                                </svg> {{ $report->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="space14"></div>
                                        <p style="color: #032c58; font-weight:bolder">{{ $report->title }}</p>
                                        <div class="space14"></div>
                                        <p>{{ $report->message }}</p>
                                        @if ($report->attachment)
                                            <div class="space10"></div>
                                            <a href="{{ asset('uploads/report/' . $report->attachment) }}" target="_blank" title="View Attachment" class="attachment-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#f7931e" viewBox="0 0 16 16">
                                                    <path d="M.5 13.5A2.5 2.5 0 0 0 3 16h6a.5.5 0 0 0 0-1H3a1.5 1.5 0 0 1 0-3h6.5a2.5 2.5 0 0 0 0-5H3a.5.5 0 0 0 0 1h6.5a1.5 1.5 0 0 1 0 3H3A2.5 2.5 0 0 0 .5 13.5z"/>
                                                    <path d="M8 0a.5.5 0 0 0 0 1h5.5a.5.5 0 0 1 0 1H8A2.5 2.5 0 0 0 8 6h5.5a.5.5 0 0 1 0 1H8a.5.5 0 0 0 0 1h5.5A2.5 2.5 0 0 0 16 5.5v-3A2.5 2.5 0 0 0 13.5 0H8z"/>
                                                </svg>
                                                Attachment
                                            </a>
                                        @endif

                                        <div class="space16"></div>

                                        <div class="action-links">
                                            <div style="display: flex; gap: 19px;">
                                                @if ($report->is_read == 0)
                                                <a href="{{ route('edit.user.report', ['report' => $report->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.121 4.03l-2.12-2.12 1.38-1.384a.5.5 0 0 1 .707 0l1.414 1.414zm-3.182.879 2.12 2.12L6.708 12.67a.5.5 0 0 1-.233.131l-3 0.75a.5.5 0 0 1-.606-.606l.75-3a.5.5 0 0 1 .13-.232l7.571-7.571z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                @endif

                                                <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this report?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" style="border: none; background: none; font-size: 14px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                             viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5zm2.5.5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0v-6zm2.5-.5a.5.5 0 0 0-.5.5v6a.5.5 0 0 0 1 0v-6a.5.5 0 0 0-.5-.5z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1 0-2H5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1h2.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11z"/>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                            <div>
                                                @if ($report->is_read == 0)
                                                    <span style="font-size: 12px; font-weight:800; color: rgb(197, 136, 38)">Sent</span>
                                                @else
                                                    <a type="button" class="view-reply-btn" data-report-id="{{ $report->id }}" style="color: rgb(10, 153, 10); font-size: 12px; font-weight:800">
                                                        View Reply
                                                    </a>
                                                    {{-- <button class="btn btn-sm btn-primary view-reply-btn" data-report-id="{{ $report->id }}">
                                                        View Reply
                                                    </button> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>You have not sent any report yet.</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination !-->
        <div class="col-lg-12">
            <div>
                {{ $reports->links() }}
            </div>
        </div>
        <div class="space40"></div>

    </div>

    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #f7931e">
            <h5 class="modal-title" id="replyModalLabel">Admin Replied to:  <span id="userReportSubject"></span> </h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p id="replyContent">Loading...</p>
            <div class="space40"></div>

            <p style="font-size:12px;"><strong>Replied by:</strong> <span id="adminName" style="font-style:italic; color:gray;"></span></p>
            </div>
        </div>
        </div>
    </div>
    <!--===== DASHBOARD AREA ENDS =======-->

    @push('scripts')
    <script>
        $(document).ready(function () {
            $('.view-reply-btn').on('click', function () {
                const reportId = $(this).data('report-id');
                $('#replyContent').text('Loading...');
                $('#adminName').text('');

                $.get(`/user/report-reply/${reportId}`, function (data) {
                    if (data.status === 'success') {
                        $('#userReportSubject').text(data.reportSubject);
                        $('#replyContent').text(data.reply);
                        $('#adminName').text(data.admin);
                    } else {
                        $('#replyContent').text('No reply found.');
                    }
                    $('#replyModal').modal('show');
                }).fail(function () {
                    $('#replyContent').text('Failed to load reply.');
                    $('#replyModal').modal('show');
                });
            });
        });
    </script>
    @endpush
@endsection
