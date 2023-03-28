@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 60vh;">
        <div class="col-md-8">
            @guest
            <div class="card">
                <div class="card-header">{{ __('登入') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('記住密碼') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登入') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('忘記密碼?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
                <h3>■ 重要規定：</h3>
                <table class="table">
                    <tr>
                        <td><h4>※作業流程</h4>
                            開放學生網路初選 --> 電腦後台自動篩選 --> 網路公佈結果給學生確認 --> 網路開放選課初選紀錄系統查詢、列印 --> 加退選(網路加退選)</td>
                    </tr>
                    <tr>
                        <td><h4>※選課確認</h4>
                            <ul>
                                <li>選課資料紀錄表應於選課異常更正申請<font color=red>(由教學業務組通知後提出紙本申請)</font>結束前完成線上確認，未完成確認者視為無誤。</li>
                                <!--<li><span style="color: red">網路初選公告後及網路加退選期間選課人數已滿課程，請</span>登入校務e-care完成線上登錄資料，並印出「學生選課資料更正申請表」，請授課教師（通識課程由各授課教師核章；語言中心開課課程統一由語言中心核章；體育課程統一由體育室教學組核章）簽章後，於公告申請時間送各部別承辦單位審查。</li>-->
                                <li>
                                    <span style="color: red"><b>網路加退選公告後仍需加退選課程，可申請【教師線上簽核選課】，請登入校務e-care完成線上登錄資料，經授課教師（通識課程由各授課教師核章；語言中心開課課程統一由語言中心核章；體育課程統一由體育室教學組核章）線上簽章，公告申請期間經日夜間部各部別承辦單位審查後匯入加退選課程。</b></span>(<a href="http://nfuaca.nfu.edu.tw/index.php/zh/2020-05-20-02-20-54/2020-05-20-02-28-19/item/2519-109-1" target=_blank>教師線上簽核選課申請流程（點選）</a>)<br>
                                    <!--
                                    (A)應屆畢業生因缺修科目學分導致無法畢業者（含延畢生）。<BR>
                                    (B)總學分數超過者。<BR>
                                    (C)總學分數不足者（含復學生、轉學生）。<BR>
                                    (D)衝堂者。<BR>
                                    (E)其他(需說明原因)。<BR></li>
                                    -->
                                <li><span style="color: red">全學期校外實習學生務必於【教師線上簽核選課申請】結束前至校務e-care完成選課確認</span></li>
                                <li>延畢生請於網路選課時間內辦理選課以利篩選</li>
                                <li>研究所新生選修課程請於加退選期間自行上網選課，以利系統篩選。研究生前兩學年每學期修習學分不得多於十二學分。</li>
                                <li><span style="color: red"><b>四技一、二、三年級學生不得少於十六學分，不得多於二十五學分。四技四年級學生不得少於九學分，不得多於二十五學分。</b></span></li>
                                <li><span style="color: red"><b>二技一年級學生不得少於十六學分，不得多於二十五學分，二技二年級學生不得少於九學分，不得多於二十五學分。</b></span></li>
                                <li><span style="color: red"><b>五專一、二、三年級及二專一年級每學期不得少於二十學分，不得多於三十四學分；五專四、五年級及二專二年級每學期不得少於十二學分，不得多於二十八學分。</b></span></li>
                                <li><span style="color: red"><b>各學制寒暑期校外實習課程學分數不併入選課學分數上下限計算：亦即選課學分若加入寒暑期校外實習課程學分超過上限，符合規定；但若選課學分加入寒暑期校外實習課程學分後才達到學分下限，則學分數不足，不符合規定，必須再加選學分！</b></span></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><h4>※相關規定</h4>
                            <ul>
                                <li>請用【帳號】: 學號 【密碼】: AD密碼 登入。<br>完成選課作業時，<span style="color: red">務必按【登出系統】以確認資料正確性。</span></li>
                                <li>若未依指示操作而造成資料不正確或發現系統有錯誤訊息時，請與以下單位連絡；若遇電話忙線或非上班時間，可寫明學號、姓名、連絡電話及問題狀況，mail至以下信箱，俾利處理後回覆。日間部：05-6315111~5114 ; yst@nfu.edu.tw<br>進修推廣部：05-6315073 ; ywsc@nfu.edu.tw 或 05-6315072<br>碩士在職專班：05-6315088~5089 ; soyoung@nfu.edu.tw<br>產學攜手專班及產學訓專班：05-6315087;seliaw@nfu.edu.tw</li>
                                <li>因TANet網路擁塞，請盡量使用校內電腦連上本系統，並請取消Proxy設定。</li>
                            </ul>
                        </td>
                    </tr>

                </table>
        </div>
            @endguest
        </div>
    </div>
</div>
@endsection
