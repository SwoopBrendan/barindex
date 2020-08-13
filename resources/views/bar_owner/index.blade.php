@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-4">
                <a href="/bar/create" class="btn btn-primary">Add a bar</a>
            </div>
            <div class="col-md-12">
                @foreach($bars as $bar)
                    <div class="card">
                        <div class="card-header">{{ $bar->name }}</div>

                        <div class="card-body p-4">
                            <div>{{ $bar->description }}</div>
                            <div>{{ $bar->email_address }}</div>
                            <div>{{ $bar->contact_number }}</div>
                            <div>{{ $bar->address_line_1 }}</div>
                            <div>{{ $bar->address_line_2 }}</div>
                            <div>{{ $bar->province()->name }}</div>
                            <div>{{ $bar->city()->name }}</div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    Managers <a href="/manager/create" class="btn btn-sm btn-primary">Add</a>
                                    @foreach($bar->getBarManagers() as $manager)
                                        <div>{{ $manager->name }}</div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    Bartenders <a href="{{ route('create.bartender') }}" class="btn btn-sm btn-primary">Add</a>
                                    @foreach($bar->getBartenders() as $bartender)
                                        <div>{{ $bartender->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
