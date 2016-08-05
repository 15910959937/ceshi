<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>laravel列表</title>
</head>
<body>
    <center>
        <div id="s1">
            <table>
                <tr>
                    <th>编号</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
                <?php $j=0;?>
                @foreach($arr as $key => $v)
                    <tr id="tr_<?php echo $v['id']?>">
                        <td><?php echo $v['id']?></td>
                        <td><?php echo $v['id_title']?></td>
                        <td><?php echo $v['id_content']?></td>
                        <td><a href="#">修改</a>||<a href="javascript:void(0)" onclick="del(<?php echo $v['id']?>)">删除</a></td>
                        <?php $j=$v['id'];?>
                    </tr>
                @endforeach
            </table>
        </div>
        <?php echo $arr->render();?>
    </center>
</body>
</html>

<script src="js/jquery-2.1.4.min.js"></script>
<script>
    function del(id){
        var last = $("#tr_"+id).siblings().last();
        $.ajax({
            type: "get",
            url: "del",
            data: {id:id,last_id:last.attr('id')},
            dataType:"json",
            success: function(msg){
                if(msg == 0){
                    alert('删除失败');
                }else{
                    var tr = '';
                    tr+='<tr id=tr_'+msg[0].id+'>';
                    tr+='<td>'+msg[0].id+'</td>';
                    tr+='<td>'+msg[0].id_title+'</td>';
                    tr+='<td>'+msg[0].id_content+'</td>';
                    tr+='<td><a href="#">修改</a>||<a href="javascript:void(0)" onclick="del('+msg[0].id+')">删除</a></td>';
                    $("#tr_"+id).remove();
                    last.after(tr)
                }
            }
        });
    }
</script>