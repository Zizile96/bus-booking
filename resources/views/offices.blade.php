@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/offices.css') }}">
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Book with Confidence – Your Journey Starts Here</h2>

    <!-- Dropdown for selecting province -->
    <div class="form-group">
        <label for="provinceSelect">Select Province</label>
        <select class="form-control" id="provinceSelect" onchange="showProvinceDetails()">
            <option value="">Select a province</option>
            <option value="EasternCape">Eastern Cape</option>
            <option value="FreeState">Free State</option>
            <option value="Gauteng">Gauteng</option>
            <option value="KZN">KwaZulu-Natal</option>
            <option value="Limpopo">Limpopo</option>
            <option value="Mpumalanga">Mpumalanga</option>
            <option value="NorthernCape">Northern Cape</option>
            <option value="NorthWest">North West</option>
            <option value="WesternCape">Western Cape</option>
        </select>
    </div>

    <!-- Cities and bus stations details -->
    <div id="provinceDetails" class="mt-4">
        <!-- Dynamic content will be inserted here based on the selected province -->
    </div>
</div>

<script>
    // Function to show province details based on the selected province
    function showProvinceDetails() {
        const province = document.getElementById('provinceSelect').value;
        const provinceDetails = document.getElementById('provinceDetails');

        let content = '';

        switch(province) {
            case 'EasternCape':
                content = `
                    <h4>Eastern Cape</h4>
                    <ul>
                        <li><strong>Port Elizabeth</strong><br>Address: 12 Main St, Port Elizabeth<br>Phone: (041) 123-4567</li>
                        <li><strong>East London</strong><br>Address: 34 Oxford St, East London<br>Phone: (043) 234-5678</li>
                        <li><strong>Grahamstown</strong><br>Address: 56 High St, Grahamstown<br>Phone: (046) 345-6789</li>
                    </ul>
                `;
                break;
            case 'FreeState':
                content = `
                    <h4>Free State</h4>
                    <ul>
                        <li><strong>Bloemfontein</strong><br>Address: 78 Charles St, Bloemfontein<br>Phone: (051) 123-4567</li>
                        <li><strong>Welkom</strong><br>Address: 90 Main Rd, Welkom<br>Phone: (057) 234-5678</li>
                    </ul>
                `;
                break;
            case 'Gauteng':
                content = `
                    <h4>Gauteng</h4>
                    <ul>
                        <li><strong>Johannesburg Central</strong><br>Address: 123 Main Street, Johannesburg<br>Phone: (011) 123-4567</li>
                        <li><strong>Pretoria North</strong><br>Address: 456 Pretoria Ave, Pretoria<br>Phone: (012) 234-5678</li>
                        <li><strong>Sandton</strong><br>Address: 789 Sandton Rd, Sandton<br>Phone: (011) 345-6789</li>
                    </ul>
                `;
                break;
            case 'KZN':
                content = `
                    <h4>KwaZulu-Natal</h4>
                    <ul>
                        <li><strong>Durban Central</strong><br>Address: 404 Durban Blvd, Durban<br>Phone: (031) 789-0123</li>
                        <li><strong>Pietermaritzburg</strong><br>Address: 505 Pietermaritz St, Pietermaritzburg<br>Phone: (033) 890-1234</li>
                        <li><strong>Richards Bay</strong><br>Address: 606 Richards Bay Rd, Richards Bay<br>Phone: (035) 901-2345</li>
                    </ul>
                `;
                break;
            case 'Limpopo':
                content = `
                    <h4>Limpopo</h4>
                    <ul>
                        <li><strong>Polokwane</strong><br>Address: 12 Nelson Mandela Dr, Polokwane<br>Phone: (015) 123-4567</li>
                        <li><strong>Tzaneen</strong><br>Address: 34 Main Rd, Tzaneen<br>Phone: (015) 678-9012</li>
                    </ul>
                `;
                break;
            case 'Mpumalanga':
                content = `
                    <h4>Mpumalanga</h4>
                    <ul>
                        <li><strong>Nelspruit</strong><br>Address: 56 Samora Machel St, Nelspruit<br>Phone: (013) 123-4567</li>
                        <li><strong>Mbombela</strong><br>Address: 78 Paul Kruger St, Mbombela<br>Phone: (013) 678-9012</li>
                    </ul>
                `;
                break;
            case 'NorthernCape':
                content = `
                    <h4>Northern Cape</h4>
                    <ul>
                        <li><strong>Kimberley</strong><br>Address: 12 Du Toitspan Rd, Kimberley<br>Phone: (053) 123-4567</li>
                        <li><strong>Upington</strong><br>Address: 34 Main St, Upington<br>Phone: (054) 678-9012</li>
                    </ul>
                `;
                break;
            case 'NorthWest':
                content = `
                    <h4>North West</h4>
                    <ul>
                        <li><strong>Rustenburg</strong><br>Address: 12 Klerksdorp Rd, Rustenburg<br>Phone: (014) 123-4567</li>
                        <li><strong>Mahikeng</strong><br>Address: 34 Nelson Mandela Dr, Mahikeng<br>Phone: (018) 678-9012</li>
                    </ul>
                `;
                break;
            case 'WesternCape':
                content = `
                    <h4>Western Cape</h4>
                    <ul>
                        <li><strong>Cape Town Central</strong><br>Address: 101 Cape Town St, Cape Town<br>Phone: (021) 456-7890</li>
                        <li><strong>Stellenbosch</strong><br>Address: 202 Stellenbosch Rd, Stellenbosch<br>Phone: (021) 567-8901</li>
                        <li><strong>George</strong><br>Address: 303 George Ave, George<br>Phone: (044) 678-9012</li>
                    </ul>
                `;
                break;
            default:
                content = '<p>Please select a province to see the bus stations and addresses.</p>';
        }

        // Insert the content into the page
        provinceDetails.innerHTML = content;
    }
</script>
@endsection
