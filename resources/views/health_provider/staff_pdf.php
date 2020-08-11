<table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>S/N</th>
                                                                            <th>Name</th>
                                                                            <th>email</th>
                                                                            <th>Qualification</th>
                                                                            <th>Specialization</th>
                                                                            <th> </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @foreach( $healthCareEmployees as
                                                                        $healthCareEmployee )
                                                                        <tr class="table-success">
                                                                            <td>{{ $healthCareEmployee->id }}</td>
                                                                            <td>{{ $healthCareEmployee->name }}</td>
                                                                            <td>{{ $healthCareEmployee->email }}</td>
                                                                            <td>{{ $healthCareEmployee->qualification }}
                                                                            </td>
                                                                            <td>{{ $healthCareEmployee->specialization }}
                                                                            </td>
                                                     