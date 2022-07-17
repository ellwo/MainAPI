@extends('layouts.search-layout')

@section('search-content')



@livewire('search.service-search',['dept'=>$dept,'parts'=>$parts,'part'=>$part,'search'=>$search,'orderby'=>$orderby,'ordertype'=>$ordertype])






@endsection
