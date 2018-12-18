@extends('layouts.base')

@section('content')
    <el-container>
        <el-header>
            <h1>客官，又有新的文书？</h1>
        </el-header>
        <el-main>
            <essay-form :existing-tags="{{ $existingTags }}" :tag-types="{{ $tagTypes }}"></essay-form>
        </el-main>
    </el-container>
@endsection