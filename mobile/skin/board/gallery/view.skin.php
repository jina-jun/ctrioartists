<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<!-- 게시물 읽기 시작 { -->
<article id="bo_v">
    <header>
        <h2 id="bo_v_title">
            <?php if ($category_name) { ?>
                <span class="bo_v_cate"><?php echo $view['ca_name']; // 분류 출력 끝 ?></span> 
            <?php } ?>
            <span class="bo_v_tit">
                <?php
                echo cut_str(get_text($view['wr_subject']), 100); // 글제목 출력
                ?>
            </span>
        </h2>
    </header>

    <div id="bo_v_info">
        <div class="profile_info">
        	<div class="profile_info_ct">
        		<span>작성자</span><strong><?php echo $view['name'] ?></strong>
                <span class="if_date">작성일</span><strong><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>
        		<span>조회</span><strong><?php echo number_format($view['wr_hit']) ?>회</strong>
                <!-- <span class="sound_only">댓글</span><strong><a href="#bo_vc"> <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo number_format($view['wr_comment']) ?>건이다</a></strong> -->
    		</div>
            <?php if(isset($view['link']) && array_filter($view['link'])) { ?>
                <!-- 관련링크 시작 { -->
                <div id="bo_v_link">
                    <h2>관련링크</h2>
                    <ul>
                        <?php
                        // 링크
                        $cnt = 0;
                        for ($i=1; $i<=count($view['link']); $i++) {
                            if ($view['link'][$i]) {
                                $cnt++;
                                $link = cut_str($view['link'][$i], 70);
                            ?>
                            <li>                        
                                <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M6.3436 12L4.92939 13.4142C3.36729 14.9763 3.36729 17.5089 4.92939 19.071C6.49148 20.6331 9.02414 20.6331 10.5862 19.071L12.0005 17.6568M12.0005 6.34311L13.4147 4.9289C14.9768 3.3668 17.5094 3.3668 19.0715 4.9289C20.6336 6.49099 20.6336 9.02365 19.0715 10.5858L17.6573 12M9.17223 14.8286L14.8291 9.17173" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <strong><?php echo $link ?></strong>
                                </a>
                            </li>
                            <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!-- } 관련링크 끝 -->
            <?php } ?>
        
            <?php if($cnt) { ?>
                <!-- 첨부파일 시작 { -->
                <div id="bo_v_file">
                    <h2>첨부파일</h2>
                    <ul>
                    <?php
                    // 가변 파일
                    for ($i=0; $i<count($view['file']); $i++) {
                        if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
                    ?>
                        <li>
                            <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path  d="M13 3C13 2.44772 12.5523 2 12 2C11.4477 2 11 2.44772 11 3L13 3ZM11 14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14H11ZM16.7071 12.7071C17.0976 12.3166 17.0976 11.6834 16.7071 11.2929C16.3166 10.9024 15.6834 10.9024 15.2929 11.2929L16.7071 12.7071ZM12.7071 15.2929L12 14.5858L12.7071 15.2929ZM11.2929 15.2929L12 14.5858H12L11.2929 15.2929ZM8.70711 11.2929C8.31658 10.9024 7.68342 10.9024 7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L8.70711 11.2929ZM4 16C4 15.4477 3.55228 15 3 15C2.44772 15 2 15.4477 2 16H4ZM22 16C22 15.4477 21.5523 15 21 15C20.4477 15 20 15.4477 20 16H22ZM19.362 20.673L18.908 19.782H18.908L19.362 20.673ZM20.673 19.362L21.564 19.816L20.673 19.362ZM3.32698 19.362L2.43597 19.816L3.32698 19.362ZM4.63803 20.673L4.18404 21.564H4.18404L4.63803 20.673ZM11 3L11 14H13L13 3L11 3ZM15.2929 11.2929L12 14.5858L13.4142 16L16.7071 12.7071L15.2929 11.2929ZM12 14.5858L8.70711 11.2929L7.29289 12.7071L10.5858 16L12 14.5858ZM12 14.5858H12L10.5858 16C11.3668 16.781 12.6332 16.781 13.4142 16L12 14.5858ZM2 16V16.2H4V16H2ZM7.8 22H16.2V20H7.8V22ZM22 16.2V16H20V16.2H22ZM16.2 22C17.0236 22 17.7014 22.0008 18.2518 21.9558C18.8139 21.9099 19.3306 21.8113 19.816 21.564L18.908 19.782C18.7516 19.8617 18.5274 19.9266 18.089 19.9624C17.6389 19.9992 17.0566 20 16.2 20V22ZM20 16.2C20 17.0566 19.9992 17.6389 19.9624 18.089C19.9266 18.5274 19.8617 18.7516 19.782 18.908L21.564 19.816C21.8113 19.3306 21.9099 18.8139 21.9558 18.2518C22.0008 17.7014 22 17.0236 22 16.2H20ZM19.816 21.564C20.5686 21.1805 21.1805 20.5686 21.564 19.816L19.782 18.908C19.5903 19.2843 19.2843 19.5903 18.908 19.782L19.816 21.564ZM2 16.2C2 17.0236 1.99922 17.7014 2.04419 18.2518C2.09012 18.8139 2.18868 19.3306 2.43597 19.816L4.21799 18.908C4.1383 18.7516 4.07337 18.5274 4.03755 18.089C4.00078 17.6389 4 17.0566 4 16.2H2ZM7.8 20C6.94342 20 6.36113 19.9992 5.91104 19.9624C5.47262 19.9266 5.24842 19.8617 5.09202 19.782L4.18404 21.564C4.66937 21.8113 5.18608 21.9099 5.74817 21.9558C6.2986 22.0008 6.97642 22 7.8 22V20ZM2.43597 19.816C2.81947 20.5686 3.43139 21.1805 4.18404 21.564L5.09202 19.782C4.71569 19.5903 4.40973 19.2843 4.21799 18.908L2.43597 19.816Z" fill="black"/>
                                </svg>
                                <strong><?php echo $view['file'][$i]['source'] ?></strong> <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                            </a>
                        </li>
                    <?php
                        }
                    }
                    ?>
                    </ul>
                </div>
                <!-- } 첨부파일 끝 -->
            <?php } ?>
    	</div>
    </div>
    


    <!-- 게시물 상단 버튼 시작 { -->
        <div id="bo_v_top">
        <?php ob_start(); ?>
        <ul class="btn_bo_user bo_v_com">
            <?php if ($prev_href || $next_href) { ?>
                <?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn text">이전글</a></li><?php } ?>
                <?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn text">다음글</a></li><?php } ?>
            <?php } ?>
        </ul>
        <ul class="btn_bo_user bo_v_com">
            <li><a href="<?php echo $list_href ?>" class="btn_b01 btn text" title="목록"><span>목록</span></a></li>
            <?php if ($admin_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn text" title="글쓰기"><span>글쓰기</span></a></li><?php } ?>
            <?php if($update_href || $delete_href || $copy_href || $move_href || $search_href) { ?>
            <li>
                <button type="button" class="btn_more_opt is_view_btn btn_b01 btn text" title="게시판 리스트 옵션">
                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span>
                    <ul class="more_opt is_view_btn"> 
                        <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>">수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><?php } ?>
                        <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" onclick="del(this.href); return false;">삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a></li><?php } ?>
                        <!-- <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" onclick="board_move(this.href); return false;">복사<i class="fa fa-files-o" aria-hidden="true"></i></a></li><?php } ?> -->
                        <!-- <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" onclick="board_move(this.href); return false;">이동<i class="fa fa-arrows" aria-hidden="true"></i></a></li><?php } ?> -->
                        <!-- <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>">검색<i class="fa fa-search" aria-hidden="true"></i></a></li><?php } ?> -->
                    </ul> 
                </button>
            </li>
            <?php } ?>
        </ul>
    <script>
        jQuery(function($){
            // 게시판 보기 버튼 옵션
            $(".btn_more_opt.is_view_btn").on("click", function(e) {
                e.stopPropagation();
                $(".more_opt.is_view_btn").toggle();
            });
            $(document).on("click", function (e) {
                if(!$(e.target).closest('.is_view_btn').length) {
                    $(".more_opt.is_view_btn").hide();
                }
            });
        });
        </script>
        <?php
            $link_buttons = ob_get_contents();
            ob_end_flush();
        ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <div id="bo_v_atc">
        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            foreach($view['file'] as $view_file) {
                echo get_file_thumbnail($view_file);
            }

            echo "</div>\n";
        }?>

        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>
    </div>

    
    <?php
    $cnt = 0;
    if ($view['file']['count']) {
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
	?>
</article>
<!-- } 게시판 읽기 끝 -->
<script>
    $(function() {
        $("a.view_file_download").click(function() {
            var href = $(this).attr("href")+"&js=on";
                $(this).attr("href", href);
        });
    });

    function board_move(href)
    {
        window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
    }
</script>

<script>
    $(function() {
        $("a.view_image").click(function() {
            window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
            return false;
        });

        // 이미지 리사이즈
        $("#bo_v_atc").viewimageresize();
    });

</script>
<!-- } 게시글 읽기 끝 -->
<!-- 게시물 상단 버튼 시작 { -->
<div id="bo_v_top">
    <?php ob_start(); ?>
    <ul class="btn_bo_user bo_v_com">
        <?php if ($prev_href || $next_href) { ?>
            <?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn text">이전글</a></li><?php } ?>
            <?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn text">다음글</a></li><?php } ?>
        <?php } ?>
    </ul>
    <ul class="btn_bo_user bo_v_com">
        <li><a href="<?php echo $list_href ?>" class="btn_b01 btn text" title="목록"><span>목록</span></a></li>
    </ul>
    <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
    ?>
</div>
<!-- } 게시물 상단 버튼 끝 -->