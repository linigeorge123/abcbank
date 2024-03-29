@extends('layouts.app')

@section('content')
<style>
    
    .container{
        margin: auto;
        width: 500px;
        max-width: 90%;
    }
    .container form{
        width: 100%;
        height: 100%;
        padding: 20px;
        background: white;
        border-radius: 4px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, .3);
    }
    .container form h2{
        /* text-align: center; */
        margin-bottom: 24px;
        color: #222;
    }
    .container form .form-control{
        width: 100%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border:1px solid silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
    }
    .container form .btn{
        margin-left: 50%;
        transform: translateX(-50%);
        width: 100%;
        height: 34px;
        border: none;
        outline: none;
        background: #5579c6;
        cursor: pointer;
        font-size: 16px;
        color: white;
        border-radius: 4px;
        transition: .3s;
    }
</style>

<div class="container">
            <br><br><form method="post" action="{{route('deposit.store')}}">
            @csrf
                <h2>Deposit Money</h2>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" min="1" class="form-control" min="0"  step="0.25" placeholder="Enter amount to deposit" name="deposit"  autofocus required>
                </div>
                <br><button type="submit" class="btn">Deposit</button>
            </form>
            
        </div>

@endsection