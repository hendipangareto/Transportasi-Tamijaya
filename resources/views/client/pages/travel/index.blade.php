<title>Tami Jaya Transport - Travel</title>

@extends('layouts.app-web')

@section('content')

    <x-travel.section-travel-header />
    <x-travel.section-travel-info :offices="$offices" />
    <x-global.section-facilities :facilities="$facilities" />
    <x-global.section-cta />

@endsection

@push('page-scripts')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        const checkPickPoint = () => {
            var destination = $("#destination_pp").val();
            $.ajax({
                url: `/admin/master-data/pick-point/get-pick-by-destination/${destination}`,
                method: "get",
                dataType: "json",
                success: function(response) {
                    var pickPoint = response.data;
                    var html = ``;
                    pickPoint.forEach(pp => {
                        html += `<div class="col-12 col-md-6 col-lg-4">
                                <div class="card--pickup-point">
                                    <span>${pp.pick_point_origin}</span>
                                    <h4 class="mt-2">${pp.pick_point_name}</h4>
                                    <p>${pp.pick_point_description ? pp.pick_point_description : ''}</p>
                                    <h5 class="mt-3">
                                        <ion-icon name="time-outline"></ion-icon> ETA : ${pp.pick_point_eta} ${pp.pick_point_zone}
                                    </h5>
                                </div>
                            </div>`;
                    })
                    $("#result-pick-point").html(html)

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
@endpush
