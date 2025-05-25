@extends('layouts.user.user_layout')

@section('title', "$settings->title")
@section('meta_description', "$settings->site_description")
@section('meta_keyword', "$settings->keywords")
@section('website_name', "$settings->site_name")

@section('content')
    <!--===== HERO AREA STARTS =======-->
    <div class="inner-header-area">
        <div class="containe-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="inner-header heading1">
                        <h2>🏠Dashboard</h2>
                        <div class="space28"></div>
                        <p><a href="{{ route('user.dashboard') }}">Home</a> <svg xmlns="http://www.w3.org/2000/svg"
                                width="9" height="16" viewBox="0 0 9 16" fill="none">
                                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg> {{ $title }}</p>
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
    <div class="dashboard-section-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if ($paymentStatus)
                        <div class="alert alert-warning">
                            ATTENTION..!!
                            <span>
                                <a href="{{ route('user.agreement.signature', ['uuid' => $paymentStatus->uuid]) }}"
                                    target="__blank">
                                    Click Here</a> to complete your Tenancy Agreement.
                            </span>
                        </div>
                    @endif

                    <div class="space30"></div>
                    <div class="dashboad-all-details-section">
                        <h3>Search Rental</h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="input-area">
                                    <form>
                                        <input type="text" placeholder="Enter property name">
                                        <button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                                </path>
                                            </svg></button>
                                    </form>
                                </div>
                            </div>
                            <div class="space28"></div>
                            <h4 class="found">{{ $propertyCount }} Result Found</h4>
                            <div class="space20"></div>
                            <div class="table-container">
                                <!-- Header -->
                                <div class="table-header">
                                    <div>Home</div>
                                    <div>Status</div>
                                    <div>Action</div>
                                </div>
                                <!-- Row 1 -->
                                @forelse ($userAgreements as $agreement)
                                    <div class="table-row">
                                        <div class="property-tab-boxarea">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="img1 image-anime">
                                                        <img style="width: 387px; height: 300px;"
                                                            src="{{ asset('uploads/property/' . $agreement->property->PropertyImages[0]->image) }}"
                                                            alt="{{ $settings->site_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="content-tab-area">
                                                        <div class="property-price">
                                                            <div class="text">
                                                                <h5>
                                                                    {{ $agreement->property->property_name ?? 'No property found' }}
                                                                </h5>
                                                                <div class="space16"></div>
                                                                <p style="line-height: 23px;">
                                                                    {{ $agreement->property->address ?? 'NA' }},
                                                                    {{ $agreement->property->city ?? 'N/A' }},
                                                                    {{ $agreement->property->state }} </p>
                                                                <div class="space20"></div>
                                                                <a href="#" class="price">#@php echo number_format($agreement->property->price) @endphp</a>/
                                                                Year
                                                            </div>
                                                        </div>
                                                        <div class="space20"></div>
                                                        <div class="property-other-widget">
                                                            <ul>
                                                                <li><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path d="M8 9H16M8 15H16" stroke="#1B1B1B"
                                                                                stroke-width="1.5"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M3 21H21V3.00046L3 3V21Z"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linejoin="round" />
                                                                        </svg></span>{{ $agreement->property->square_ft }}
                                                                    sqft</li>
                                                                <li><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path d="M22 17.5H2" stroke="#1B1B1B"
                                                                                stroke-width="1.5" stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M22 21V16C22 14.1144 22 13.1716 21.4142 12.5858C20.8284 12 19.8856 12 18 12H6C4.11438 12 3.17157 12 2.58579 12.5858C2 13.1716 2 14.1144 2 16V21"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M16 12V10.6178C16 10.1103 15.9085 9.94054 15.4396 9.7405C14.4631 9.32389 13.2778 9 12 9C10.7222 9 9.53688 9.32389 8.5604 9.7405C8.09154 9.94054 8 10.1103 8 10.6178V12"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                            <path
                                                                                d="M20 12V7.36057C20 6.66893 20 6.32311 19.8292 5.99653C19.6584 5.66995 19.4151 5.50091 18.9284 5.16283C16.9661 3.79978 14.5772 3 12 3C9.42282 3 7.03391 3.79978 5.07163 5.16283C4.58492 5.50091 4.34157 5.66995 4.17079 5.99653C4 6.32311 4 6.66893 4 7.36057V12"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                        </svg></span>{{ $agreement->property->rooms_num }}
                                                                    Bed Room</li>
                                                                <li><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path d="M22 17.5H2" stroke="#1B1B1B"
                                                                                stroke-width="1.5" stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M22 21V16C22 14.1144 22 13.1716 21.4142 12.5858C20.8284 12 19.8856 12 18 12H6C4.11438 12 3.17157 12 2.58579 12.5858C2 13.1716 2 14.1144 2 16V21"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M16 12V10.6178C16 10.1103 15.9085 9.94054 15.4396 9.7405C14.4631 9.32389 13.2778 9 12 9C10.7222 9 9.53688 9.32389 8.5604 9.7405C8.09154 9.94054 8 10.1103 8 10.6178V12"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                            <path
                                                                                d="M20 12V7.36057C20 6.66893 20 6.32311 19.8292 5.99653C19.6584 5.66995 19.4151 5.50091 18.9284 5.16283C16.9661 3.79978 14.5772 3 12 3C9.42282 3 7.03391 3.79978 5.07163 5.16283C4.58492 5.50091 4.34157 5.66995 4.17079 5.99653C4 6.32311 4 6.66893 4 7.36057V12"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                        </svg></span>{{ $agreement->property->master_bedrooms_num }}
                                                                    Master Bed Rooms</li>
                                                                <li><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path d="M6 20L5 21M18 20L19 21"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                            <path
                                                                                d="M3 12V13C3 16.2998 3 17.9497 4.02513 18.9749C5.05025 20 6.70017 20 10 20H14C17.2998 20 18.9497 20 19.9749 18.9749C21 17.9497 21 16.2998 21 13V12"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M2 12H22" stroke="#1B1B1B"
                                                                                stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                            <path
                                                                                d="M4 12V5.5234C4 4.12977 5.12977 3 6.5234 3C7.64166 3 8.62654 3.73598 8.94339 4.80841L9 5"
                                                                                stroke="#1B1B1B" stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                            <path d="M8 6L10.5 4" stroke="#1B1B1B"
                                                                                stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                        </svg></span>{{ $agreement->property->bathrooms_num }}
                                                                    Baths</li>
                                                            </ul>
                                                            <div class="space24"></div>
                                                            <p><span
                                                                    style="color: rgb(55, 52, 52); font-weight: bolder;">Type:</span>
                                                                <span
                                                                    style="color: gray; font-weigth: bold;">{{ $agreement->property->category->name }},
                                                                    {{ ucfirst($agreement->property->type) }} -
                                                                    Estate</span>
                                                            </p>
                                                            <div class="space24"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="status">
                                            @if ($agreement->payment_status == 0)
                                                <a href="#" class="status-badge pending">Pending</a>
                                            @elseif ($agreement->payment_status == 1)
                                                <a href="#" class="status-badge sold">Approved</a>
                                            @elseif ($agreement->payment_status == 2)
                                                <a href="#" class="status-badge approved ">Paid</a>
                                            @endif

                                            @php
                                                $renewDate = \Carbon\Carbon::parse(
                                                    $agreement->agreement_date,
                                                )->addYear();
                                            @endphp
                                            @if ($agreement->agreement_date !== null)
                                                <p style="font-weight:900; margin-top:8px;">Renew
                                                    on:{{ $renewDate->format('jS, F Y') }}</p>
                                            @endif
                                        </div>

                                        <div class="actions">
                                            @if ($agreement->payment_status == 0)
                                                <button class="edit show-payment-modal"
                                                    data-property-name="{{ $agreement->property->property_name }}"
                                                    data-price="{{ number_format($agreement->property->price) }}"
                                                    data-details="{!! $paymentDetials->payment_details !!}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#paymentDetailsModal"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <rect x="2" y="5" width="20" height="14" rx="2"
                                                            ry="2" stroke="currentColor" fill="none"
                                                            stroke-width="2" />
                                                        <line x1="2" y1="10" x2="22"
                                                            y2="10" stroke="currentColor" stroke-width="2" />
                                                        <rect x="4" y="13" width="4" height="2"
                                                            fill="currentColor" />
                                                    </svg>
                                                    Payment Details
                                                </button>
                                            @endif


                                            <a
                                                href="{{ url('property-details/' . $agreement->property->category->slug . '/' . $agreement->property->slug) }}">
                                                <button class="edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179
                                                             15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264
                                                             17.89ZM3 19.89H21V21.89H3V19.89Z">
                                                        </path>
                                                    </svg>
                                                    View Property
                                                </button>
                                            </a>


                                            <a href="{{ route('user.view.agreement', ['uuid' => $agreement->uuid]) }}"
                                                target="__blank">
                                                <button class="sold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 14.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5A2.25 2.25 0 006.75 19.5h6.75m6-5.25L13.5 19.5m0 0h6m-6 0v-6" />
                                                    </svg>
                                                    Agreement
                                                </button>
                                            </a>
                                            <button type="button" class="delete show-delete-modal"
                                                data-id="{{ $agreement->id }}"
                                                data-name="{{ $agreement->property->property_name }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4
                                                        21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z"
                                                    >
                                                    </path>
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <div class="space20"></div>
                                    <h3>You have not rented a home yet.!</h3>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space30"></div>

    <!--===== DASHBOARD AREA ENDS =======-->
    <div class="space30"></div>

    <!-- Payment Details Modal -->
    <div class="modal fade" id="paymentDetailsModal" tabindex="-1"
        aria-labelledby="paymentDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentDetailsLabel">Payment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="paymentModalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteModalBody"></div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</button>
            </div>
            </div>
        </div>
    </div>


@push('scripts')
<script>

</script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.show-payment-modal').forEach(button => {
                button.addEventListener('click', () => {
                    const property = button.dataset.propertyName;
                    const price = button.dataset.price;
                    const details = button.dataset.details;

                    document.getElementById('paymentModalBody').innerHTML = `
                        <p><strong>Property:</strong> ${property}</p>
                        <p><strong>Payable Sum:</strong> ₦${price} / year</p>
                        <hr>
                        <p><strong>Account Details:</strong> ${details}</p>
                    `;
                });
            });
        });

         // Pass the route with a placeholder into JS (notice the `:id`)
         window.deleteRouteTemplate = "{{ route('user.property.destroy', ['id' => ':id']) }}";

        let currentDeleteId = null;

        document.addEventListener('DOMContentLoaded', () => {
            const deleteModalBody = document.getElementById('deleteModalBody');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            document.querySelectorAll('.show-delete-modal').forEach(button => {
                button.addEventListener('click', () => {
                    currentDeleteId = button.dataset.id;
                    const name = button.dataset.name;

                    deleteModalBody.innerHTML = `Are you sure you want to delete the property <strong>${name}</strong>? This action cannot be undone.`;
                });
            });

            confirmDeleteBtn.addEventListener('click', () => {
                if (!currentDeleteId) return;

                // Replace ":id" in the route with the actual ID
                 const deleteUrl = window.deleteRouteTemplate.replace(':id', currentDeleteId);


                 // Hide modal
                const modalEl = document.getElementById('deleteModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();


                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        return response.json().then(data => {
                            alert(data.message || 'Failed to delete.');
                        });
                    }
                })
                .catch(err => {
                    console.error('Delete error:', err);
                    alert('An error occurred.');
                });
            });
        });

    </script>

@endpush



@endsection
