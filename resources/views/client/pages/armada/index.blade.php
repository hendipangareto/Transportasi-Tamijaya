<title>Tami Jaya Transport - Armada</title>

@extends('layouts.app-web')

@section('content')

    <x-armada.section-armada-header />
    <x-armada.section-armada-list :buses="$buses" />
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


        const openDetailBus = (id) => {
            $("#ArmadaDetailModal").modal('show');
            $.ajax({
                url: `/api/master-data/bus/${id}`,
                method: "get",
                dataType: "json",
                success: function(response) {
                    var response = response.data;
                    response.gallery.map((el, i) => {
                        var bus_photo_src = `../../storage/${el.bus_photo}`;
                        $("#data-image-bus").append(`<img src='` + bus_photo_src + `'/>`);
                    });

                    var src = `../../storage/${response.bus_image}`;
                    $("#bus_gallery_bus_image").attr("src", src);

                    $("#bus_gallery_bus_code").text(response.bus_code);
                    $("#bus_gallery_bus_type").text(response.bus_type);
                    $("#bus_gallery_bus_capacity").text(response.bus_capacity);
                    $("#bus_gallery_bus_name").text(response.bus_name);
                    $("#bus_gallery_description").text(response.bus_description);

                    var facility_bus = response.bus_facility;
                    var ex_facility = facility_bus.split(", ");
                    var html_facility = ``;
                    var selectedFacility = new Array();

                    ex_facility.forEach((facility, i) => {
                        html_facility +=
                            `<li> <div class="card--facilities-sm">  <ion-icon name="checkmark-done-outline" class="icon mr-2"></ion-icon> ${facility} </div> </li> `;
                    })
                    $("#bus_gallery_facility").html(html_facility);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
@endpush
