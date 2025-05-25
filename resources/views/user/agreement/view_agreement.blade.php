<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tenancy Agreement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- signature font -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <style>
        body {
            padding: 3rem;
            font-family: "Courier New", Courier, monospace;
            font-size: 14px;
            line-height: 1.6;
            color: #212529;
        }

        .page {
            page-break-after: always;
            padding: 40px;
            background: white;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            text-decoration: underline;
        }

        .agreement-title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 2rem;
        }

        .section-title {
            font-weight: bold;
            margin-top: 2rem;
        }

        .indent {
            text-indent: 40px;
        }

        .signature-section {
            margin-top: 4rem;
        }

        .signature-block {
            margin-top: 2rem;
        }

        .boldt {
            font-weight: 800;
            font-family:'Courier New', Courier, monospace;
            font-size: 20px
        }

        .custom-alpha {
            list-style: none;
            counter-reset: custom-counter;
            padding-left: 20px;
        }

        .custom-alpha li {
            counter-increment: custom-counter;
            position: relative;
            margin-bottom: 10px;
            padding-left: 30px;
        }

        .custom-alpha li::before {
            content: counter(custom-counter, upper-alpha) ".) ";
            position: absolute;
            left: 0;
        }

        .signature {
            font-family: 'Great Vibes', cursive;
            font-size: 32px;
            color: #333;
        }
        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            margin: 20px 0;
        }

        .action-buttons button {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background: linear-gradient(135deg, #b07312, #442405);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1 1 120px;
        }

        .action-buttons button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #8b4c04, #004085);
        }

        @media (max-width: 500px) {
            .action-buttons {
                flex-direction: column;
                padding: 1px;
                height: 5px;
            }
        }
    </style>
</head>

@php

    use Illuminate\Support\Carbon;

    $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
    $roomWord = ucfirst($formatter->format($agreement->property->rooms_num));

    $date = Carbon::parse($agreement->agreement_date);
    $day = $date->format('jS'); // 1st, 2nd, 3rd...
    $month = $date->format('F'); // Full month name (May)
    $year = $date->format('Y'); // Year (2025)


    $formattedDate = \Carbon\Carbon::parse($agreement->date)->format('d/m/y');
@endphp

<body>

    <div class="page">
        <h2 class="agreement-title">{{ $title }}</h2>
        <p class="indent"><strong>THIS TENANCY AGREEMENT</strong> is made this
            <strong style="text-decoration: underline"> {{ $day }}</strong> day of
            <strong style="text-decoration: underline">{{ $month }}</strong>,
            <strong>{{ $year }}</strong> </p>
        <p class="mt-2 boldt">BETWEEN</p>
        <p><strong>{{ $settings->landlord_name }}</strong> of {{ $agreement->property->address }}, {{ $agreement->property->state }}
            (hereinafter referred to as 'The Landlord' which expression shall where the context so admit include its
            agents and
            representatives and persons or corporate organizations authorized by it) of the <b class="boldt">ONE PART</b></p>
        <p class="boldt"> AND</p>
        <p><strong>MR. RICHARD OBIONKAN PRAISE</strong> of {{ $agreement->property->address }}, {{ $agreement->property->state }}
            (hereinafter referred to as 'The Tenant' which expression shall where the context so admit include his
            representatives and assigns) of the <b class="boldt">OTHER PART</b>.</p>

        <h5 class="section-title">A. BACKGROUND</h5>
        <ol>
            <li class="mb-3">The landlord is the legal and equitable owner of <b> ALL THAT PROPERTY</b> comprising
                inter alia of A {{ $roomWord }} ({{ $agreement->property->rooms_num }}) Bedroom {{ $agreement->property->category->name }}
                Home and all other appurtenance situate at {{ $agreement->property->address }}, {{ $agreement->property->state }} hereinafter referred to as the <b>Demised
                    Premises</b>.
            </li>
            <li>The Landlord has agreed to let and the tenant agreed to take the demised premises comprising of A {{ $roomWord }}
                ({{ $agreement->property->rooms_num }}) Bedroom {{ $agreement->property->category->name }} and all other appurtenance
                in the property hereinbefore described.
            </li>
        </ol>
    </div>

    <div class="page">
        <h5 class="section-title">B. AGREEMENT</h5>
        <p class="indent">In consideration of the rent hereinafter reserved and the covenants In consideration of the
            rent hereinafter
            reserved and the covenants on the part of the landlord and the tenant hereinafter contained,
            the landlord demises unto the tenant all that premises comprising of A {{ $roomWord }}
            ({{ $agreement->property->rooms_num }}) and all other appurtenance situate at {{ $agreement->property->address }}, {{ $agreement->property->state }},
            (hereinafter referred to as the demised premises) to hold <b class="boldt">SAME</b> unto the tenant as a <b class="boldt">YEARLY TENANT</b>,
            commencing on the {{ \Carbon\Carbon::parse($agreement->agreement_date)->format('jS, F Y') }} and terminating on the {{ \Carbon\Carbon::parse($agreement->agreement_date)->format('jS, F') }} of every succeeding year, paying
            therefore the sum of:</p>
        <p class="indent">Annual rent: <strong>₦{{ number_format($agreement->property->price, 2) }} (save in cases of rent increment)</strong></p>
        <p class="indent">Service charge: <strong>₦{{ number_format($agreement->property->service_charge, 2) }} (save in cases of increment)</strong></p>
        <p class="indent">Caution fee: <strong>₦{{ number_format($settings->caution_fee, 2) }}</strong></p>
        <p class="indent">Legal fee: <strong>₦{{ number_format($settings->legal_fee, 2) }}</strong></p>
        <p class="indent">Account Details: <strong>{!! $payment->payment_details !!}</strong></p>
        <p class="indent">Contact: <strong>{{ $settings->mobile }}, {{ $settings->email }}</strong></p>
    </div>

    <div class="page">
        <h5 class="section-title">C. TENANT COVENANTS</h5>
        <ol class="custom-alpha">
            <li>To pay estate dues of N3,000 monthly...</li>
            <li> To use the demised premises for lawful purposes only, as such shall not harbour criminals of any sort,
                prostitutes or persons of questionable character in the demised premises.</li>
            <li>Not to use any type of highly inflammable substance or explosive in the premises which may likely
                occasion fire hazard in the demised premises.</li>
            <li>To use all electrical appliances in the said premises with extreme care and caution to prevent any
                explosion of fire at the demised premises and/or damage to same.</li>
            <li>To immediately repair, replace or pay for all damages done to any part of the demised premises either by
                the tenant, his/her agents or servants which said repairs must be carried out within two (2) weeks of
                the occurrence of such damage.</li>
            <li>Not to tamper with electricity meters and to report any fault arising therefrom to the landlord or its
                agent or appropriate Electricity Distribution Company officials and particularly not to connect
                electricity illegally to any part of the demised premises.</li>
            <li> Not to drive or park vehicles recklessly in the demised premises in such a way as to disturb other
                co-tenants or constitute nuisance therein.</li>
            <li>Not to bring any explosive or any substance capable of causing explosion or inferno anywhere within and
                around the demised premises.</li>
            <li>To pay for all electricity consumed and waste disposal (solid and liquid) throughout the term herein
                created in the demised premises.</li>
            <li>To bear, pay and discharge during the said term all charges, rates, township/estate improvement,
                security and general rates, taxes, charges and other outgoings whatsoever imposed on or incurred in
                respect of the demised premises.</li>
            <li>To use the demised premises for residential purposes only.</li>
            <li>To keep the demised premises in good and tenantable repair and condition during the said term
                (reasonable wear and tear expected) without any alterations except such as shall be approved by the
                Landlord in writing and to yield up the same in such repair and condition at the determination of the
                term hereby created.</li>
            <li>Not to make or permit to be made any structural alterations in or additions to the demised premises or
                any part thereof without the consent in writing of the Landlord.</li>
            <li>Not to assign, underlet, sublet or part with possession of the demised premises or any part thereof
                without the prior written consent of the Landlord first had and obtained.</li>
            <li>To permit the Landlord's agents, servants and representatives and/or workmen at all reasonable times
                during the said term to enter upon and view, inspect and examine the condition of the demised premises
                upon repairs in accordance with the covenants herein contained, and such right to inspect the demised
                premises shall be exercisable at least once in every one (1) year.</li>
            <li>To use all fixtures and fittings in the demised premises including pumping machine in a reasonable and
                tenantable manner and to replace/repair all missing/damaged items or defects caused by the tenants or
                his/her servants excepting those due to ordinary wear and tear.</li>
            <li>To comply with any notice that may be given by the landlord requiring remedy of any breach or any of the
                obligations on the part of the tenant as contained in the Tenant's covenants as set out in paragraph C
                (a)-(s).</li>
            <li>Not to use the demised premises in such a way as to constitute a nuisance to adjoining and co-occupiers
                of the building.</li>
            <li>Not to use the demised premises and its appurtenance to a place of rearing animals of any kind.</li>
            <li> To indemnify the landlord at all times in respect of any damage to the demised premises or its
                environment that is caused by or attributable to the tenant.</li>
            <li>To be strictly responsible for all internal repairs as may be required from time to time in the demised
                premises.</li>
            <li>To yield up vacant possession of the demised premises in good repairs to the Landlord upon the
                determination of this Agreement.</li>
        </ol>

        <h5 class="section-title">D. LANDLORD COVENANTS</h5>
        <ol class="custom-alpha">
            <li>To keep the premises structurally sound wind and watertight and the exterior of the premises and all
                additions
                thereto and the boundary walls and fences thereof in good and tenantable condition.</li>
            <li>That the tenant paying and observing the stipulations on his/her part shall peaceably and quietly
                possess and enjoy the
                demised premises during the tenancy without any interruptions by the Landlord or its representatives.
            </li>
            <li>To pay all rates imposed on the owner of the premises and to pay all taxes incidental thereto.</li>
            <li>To take steps to remedy breaches of any of the Landlord's covenants as set out herein, the tenant having
                first notified the Landlord of the existence of such breach.</li>
            <li>To make provision for the treatment and maintenance of the water plant as may be required.</li>
            <li>To make provision for the cleaning of the premises and maintenance of the green area within the
                premises.</li>
            <li>To provide the premises with the services of security guards at all times.</li>
        </ol>
        <h5 class="section-title">E. MUTUAL AGREEMENT</h5>
        <ol>
            <li class="mb-3">That if the Rent, Service Charge or any part thereof shall remain unpaid for a period of
                one (1) month after the commencement of the term herein created and after an official
                demand have been made for the said rent, the tenancy shall lapse and it shall
                become lawful for the Landlord to re-enter upon the demised premises upon the
                service of a notice of intention to so do.</li>
            <li class="mb-3">Save as set out in paragraph 1 above, this tenancy agreement shall be terminated,
                (where the tenant is not in arrears of rent) by either party issuing a One (1) Month Notice to so
                terminate.</li>
            <li>Any notice to be served on the Tenant shall be deemed as appropriate and proper if served on tenant
                personally or
                otherwise pasted on the entrance door of the premises</li>
        </ol>



        <p><strong>IN WITNESS WHEREOF </strong> the parties hereto have duly executed this agreement the day and year
            first above mentioned.</p>
        <p><strong>SIGNED, SEALED AND DELIVERED</strong> by the
            Within named <strong>LANDLORD</strong></p>

        <div class="signature-section">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>LANDLORD</strong>: <b>{{ $settings->landlord_name }}</b></p>
                    <p class="signature-block"><strong>Address</strong>: {{ $agreement->property->address }}</p>
                    <p class="signature-block"><strong>Signature</strong>:
                        <span class="signature">{{ ucfirst($settings->signature) }}</span>
                    </p>
                    <p class="signature-block"><strong>Date</strong>: {{ $formattedDate }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>TENANT</strong>: <b>{{ strtoUpper($user->name) }}</b></p>
                    <p>In the presence of:</p>
                    <p class="signature-block"><strong>Name:</strong> {{ $agreement->name }}</p>
                    <p class="signature-block"><strong>Address:</strong> {{ $agreement->address }}</p>
                    <p class="signature-block"><strong>Signature:</strong> <span
                            class="signature">{{ $agreement->signature }}</span></p>
                    <p class="signature-block"><strong>Date:</strong> {{ $formattedDate }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="action-buttons">
        <button onclick="window.print()">Print</button>
    </div>

</body>

</html>
