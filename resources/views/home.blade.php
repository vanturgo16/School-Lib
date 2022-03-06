<style>
    .row > div > div {
        border-radius: 25px;
    }
    .row > div > div:hover {
        animation: bounce; 
        animation-duration: 1.5s; 
    }
</style>
@extends('layout.master')

@section('content')
    <div class="main-grid">
        <div class="agile-grids">	
            <div class="buttons-heading">
                <h2>Summary</h2>
            </div>
            
            <!-- Summary -->
            <div class="panel variations-panel">
                <div class="panel-body mtn">
                    <div class="col-adjust-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="bg-system pv20 text-white fw600 text-center">
                                    Total Books <h2>23</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-primary pv20 text-white fw600 text-center">
                                    Books In <h2>11</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-success pv20 text-white fw600 text-center">
                                    Books Out <h2>11</h2>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- End Summary -->
            {{-- 
            <br>
            <!-- Per Departemen-->
            <div class="w3l-table-info">
                    <table id="summary" class="display" style="width: 100%">
                    <thead>
                        <tr>
                        <th>Department Name</th>
                        <th>Total Ticket</th>
                        <th>New ticket</th>
                        <th>On Progress</th>
                        <th>Hold Ticket</th>
                        <th>Closed Ticket</th>
                        <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Customer Care</td>
                        <td>325</td>
                        <td>25</td>
                        <td>20</td>
                        <td>3</td>
                        <td>300</td>
                        <td>65%</td>
                        </tr>
                        <tr>
                        <td>System Administrator</td>
                        <td>100</td>
                        <td>45</td>
                        <td>3</td>
                        <td>5</td>
                        <td>70</td>
                        <td>80%</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
            <!-- end per departemen-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#summary').DataTable( {
                "order": [],
                responsive: true
            } );
        } );
    </script>
     --}}
@endsection