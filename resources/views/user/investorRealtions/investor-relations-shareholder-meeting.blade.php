<!doctype html>
<html>

<head>
    @include('user.inc_head')
</head>

<body>

    <div class="container-fluid">

        @include('user.inc_menu')
        @if ($type)
            <section class="row">
                <div class="col-12 banner-inside wow fadeInDown">
                    <figure><img src="{{ asset('/images/' . $type->image) }}" alt=""></figure>
                    <h1>{{ $type->name_en }}</h1>
                </div>
            </section>
        @else
            <section class="row">
                <div class="col-12 banner-inside wow fadeInDown">
                    <figure><img src="images/banner-irnews.webp" alt=""></figure>
                    <h1>การประชุมผู้ถือหุ้น</h1>
                </div>
            </section>
        @endif
        <section class="row">
            <div class="col-12 wrap-top-homeir wrap-tophistory wow fadeInDown">
                <div class="container">
                    <div class="row page-content ir-manytable">
                        <div class="col-12 col-md-6">
                            <h2 class="topic-irpage">การประชุมผู้ถือหุ้น</h2>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ir-boxselect">
                                <span>ปี :</span>
                                <select name="year" class="form-select" id="">
                                    <option selected disabled value="">เลือกปี</option>
                                    @foreach ($all_data as $posts)
                                        <option class="selectbox" value="{{ $posts->created_at }}">
                                            <?php
                                            $date = date('Y', strtotime($posts->created_at));
                                            echo $date;
                                            ?>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInDown">
                            <div class="ir-table table-responsive">
                                <table class="table table-striped">
                                    <thead class="top-headtable">
                                        <tr>
                                            <th scope="col">หนังสือเชิญประชุมผู้ถือหุ้น</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($invitationletters as $invitationletter)
                                            <tr>
                                                <th scope="row">{{ $invitationletter->name }}</th>
                                                <td><a href="{{ asset('/images/' . $invitationletter->pdflink) }}"
                                                        class="btn-download" target="_blank"><span>ดาวน์โหลด</span> <i
                                                            class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
                                            <tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="4">เอกสารแนบ</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($attachmentposts as $invitationletter)
                                            <tr>
                                                <th scope="row">{{ $invitationletter->name }}</th>
                                                <td><a href="{{ asset('/images/' . $invitationletter->pdflink) }}"
                                                        class="btn-download" target="_blank"><span>ดาวน์โหลด</span> <i
                                                            class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
                                            <tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-12 wow fadeInDown">
                            <div class="ir-table table-responsive">
                                <table class="table table-striped">
                                    <thead class="top-headtable">
                                        <tr>
                                            <th scope="col">หลักเกณฑ์การให้สิทธิผู้ถือหุ้น</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-group-divider">
                                        @foreach ($criteriaposts as $invitationletter)
                                            <tr>
                                                <th scope="row">{{ $invitationletter->name }}</th>
                                                <td><a href="{{ asset('/images/' . $invitationletter->pdflink) }}"
                                                        class="btn-download" target="_blank"><span>ดาวน์โหลด</span> <i
                                                            class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
                                            <tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('user.inc_footer')

        <script>
            $(".box-menu > ul > li:nth-child(7) > a").addClass("here");
            $(".box-menu ul li > .submenu ul > li:nth-child(0) > a").addClass("here");
        </script>


    </div>

</body>

</html>
