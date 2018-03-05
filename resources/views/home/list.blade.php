@extends( 'layouts.home' )
@section( 'info' )
    <title>{{$field->cate_name }} - {{Config::get( 'web.seo_title' )}}</title>
    <meta name="keywords" content="{{$field->cate_keywords }}"/>
    <meta name="description" content="{{$field->cate_description }}"/>
@endsection
@section( 'content' )
    <article class="blogs">
        <h1 class="t_nav"><span>{{$field->cate_title}}</span><a href="{{url( '/' )}}" class="n1">网站首页</a><a
                    href="{{url( 'list/'.$field->id )}}" class="n2">{{$field->cate_name}}</a></h1>

        <div class="newblog left">
            @foreach( $data as $d )
            <h2>{{$d['art_title']}}</h2>

            <p class="dateview"><span>发布时间：{{date('Y-m-d',$d['art_time'])}}</span><span>作者：{{$d['art_editor']}}</span><span>分类：[<a href="{{url( 'list/'.$field->id )}}">{{$field->cate_name}}</a>]</span>
            </p>

            <ul class="nlist">
                <p>{{$d['art_description']}}</p>
                <a title="{{$d['art_title']}}" href="{{url( 'a/'.$d['id'] )}}" target="_blank" class="readmore">阅读全文>></a>
            </ul>
            <div class="line"></div>
            @endforeach

            <div class="page">
                {{$data->links()}}
            </div>
        </div>
        <aside class="right">
            <div>
                <form action="{{url('serch')}}" method="get">
                    {{csrf_field()}}
                    <input type="text" name="s"/><span style="margin-left:15px;"><button>搜索</button></span>
                </form>
            </div>
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a
                        class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span
                        class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585"></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
            </script>
            <!-- Baidu Button END -->
            <div class="news" style="float:left;">
                @parent
            </div>
            <div class="visitors">
                <h3><p>最近访客</p></h3>
                <ul>

                </ul>
            </div>

        </aside>
    </article>
@endsection

