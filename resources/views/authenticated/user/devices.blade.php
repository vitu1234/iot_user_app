@extends('authenticated.layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Devices</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="devices/add" type="button" class="btn btn-sm btn-outline-secondary">
                <span data-feather="plus" class="align-text-bottom"></span>
                Add Devices
            </a>
        </div>
    </div>

    <div class="table-responsive" id="devices">
        <table class="table table-striped table-hover table-md">
            <thead>
            <tr>
                <th scope="col">Device ID</th>
                <th scope="col">Device Name</th>
                <th scope="col">Mode</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="table_body">
            <!--                    <tr>-->
            <!--                        <td>1ddd43nbm4v3mv5bvmqvmwv5bnqasfngh</td>-->
            <!--                        <td>Ndata Farm</td>-->
            <!--                        <td>Temperature Sensor</td>-->
            <!--                        <td>Yangjae 1(il)-dong, Seocho-gu, Seoul, South Korea</td>-->
            <!--                        <td>North East of the farm</td>-->
            <!--                        <td>-->
            <!--                            <div class="dropdown">-->
            <!--                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"-->
            <!--                                        data-bs-toggle="dropdown" aria-expanded="false">-->
            <!--                                    <span data-feather="more-horizontal" class="align-text-bottom"></span>-->
            <!--                                    Action-->
            <!--                                </button>-->
            <!--                                <ul class="dropdown-menu">-->
            <!--                                    <li><a class="dropdown-item text-warning" href="#">-->
            <!--                                        <span data-feather="edit-2" class="align-text-bottom"></span> Modify-->
            <!--                                    </a></li>-->
            <!--                                    <li><a class="dropdown-item text-danger" href="#">-->
            <!--                                        <span data-feather="trash-2" class="align-text-bottom"></span> Delete-->
            <!--                                    </a></li>-->
            <!--                                </ul>-->
            <!--                            </div>-->
            <!--                        </td>-->
            <!--                    </tr>-->


            </tbody>
        </table>
    </div>
@endsection
