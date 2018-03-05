@extends( 'layouts.admin' )
@section( 'content' )
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">首页</a> &raquo; 添加文章
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>快捷操作</h3>
        @if( count( $errors ) > 0 )
            <div class="mark">
                @if( is_object( $errors ) )
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url( 'admin/article/create' )}}"><i class="fa fa-plus"></i>添加文章</a>
            <a href="{{url( 'admin/article' )}}"><i class="fa fa-recycle"></i>全部文章</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url( 'admin/article' )}}" method="post">
        {{csrf_field()}}
        <table class="add_tab" >
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>分类：</th>
                <td>
                    <select name="cate_id">
                        @foreach( $data as $v )
                            <option value="{{$v->id}}">{{$v->_cate_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>文章标题：</th>
                <td>
                    <input type="text" class="lg" name="art_title">
                </td>
            </tr>

            <tr>
                <th>文章标签：</th>
                <td>
                    <input type="text" size="50" name="art_tag">
                </td>
            </tr>

            <tr>
                <th>描述：</th>
                <td>
                    <textarea name="art_description"></textarea>
                </td>
            </tr>
            <tr>
                <th>作者：</th>
                <td>
                    <input type="text" size="20" name="art_editor" value="MinBo"></input>
                </td>
            </tr>
            <tr>
                <th>文章内容：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="{{asset( 'resources/org/ueditor/ueditor.config.js' )}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset( 'resources/org/ueditor/ueditor.all.min.js' )}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset( 'resources/org/ueditor/lang/zh-cn/zh-cn.js' )}}"></script>
                    <script id="editor" name="art_content" type="text/plain" style="width:860px;height:400px;"></script>
                    <script>
                        var ue = UE.getEditor('editor');
                    </script>
                </td>
                <style>
                    .edui-default{line-height: 28px;}
                    div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body{
                        overflow: hidden;height:20px;
                    }
                    div.edui-box{overflow: hidden;height: 22px;}
                </style>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection
