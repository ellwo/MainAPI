@extends('layouts.search-layout')

@section('search-content')



@livewire('search.bussinse-search',['markt'=>$markt,'dept'=>$dept,'parts'=>$parts,'part'=>$part,'search'=>$search,'orderby'=>$orderby,'ordertype'=>$ordertype])






@endsection
