<html lang="en">
    <head>
        <title> List Tasks</title>
    </head>

    <body>
    @extends('layouts.app')
    @section('content')
        <div class="container">
            講座情報
            <div>
                講座名
            </div>
            <div>
                カリキュラム名
            </div>
            を登録しました。
            引き続き関連する『テスト』や『アンケート』を登録してください。
            <div>
                <a href="{{ route('question.add') }}" type="button" class="btn btn-primary">テスト登録</a>
                <button type="button" class="btn btn-primary">アンケート登録</button>
            </div>
        </div>
    @endsection
    </body>

</html>