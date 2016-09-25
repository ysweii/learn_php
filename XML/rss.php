<?php
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo <<<rss
		<rss version="2.0"> 
			<channel>
				<title>PHP学院</title>
				<link>http://php.itcast.cn/</link>
				<description>从基础开始</description>
				<item>
					<title>PHP课程</title>
					<link>http://php.itcast.cn/php/course.shtml</link>
					<description>PHP课程非常好</description>
				</item>
				<item>
					<title>PHP师资</title>
					<link>http://php.itcast.cn/php/teacher.shtml</link>
					<description>PHP师资</description>
				</item>
			</channel>
		</rss>
rss;
?>