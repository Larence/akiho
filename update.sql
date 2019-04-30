create database common; #创建共用数据库
use common; 
CREATE TABLE `auths` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `domain` varchar(255) NOT NULL COMMENT '域名',
  `lang` char(2) NOT NULL COMMENT '语言',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `auths` (`id`, `user_id`, `domain`, `lang`, `create_time`, `update_time`) VALUES
(1, 2, 'www.custom.com', 'cn', 1552274972, 1552274972),
(2, 2, 'en.custom.com', 'en', 1552274972, 1552274972),
(3, 2, 'de.custom.com', 'de', 1552274972, 1552274972),
(4, 2, 'es.custom.com', 'es', 1552274972, 1552274972),
(5, 2, 'fr.custom.com', 'fr', 1552274972, 1552274972),
(6, 2, 'ru.custom.com', 'ru', 1554877551, 1554877551),
(7, 2, 'py.custom.com', 'py', 1556180551, 1556180551),
(8, 2, 'ja.custom.com', 'ja', 1556433601, 1556433601),
(9, 2, 'ko.custom.com', 'ko', 1556433665, 1556433665);

ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`lang`);

ALTER TABLE `auths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `pic` varchar(255) NOT NULL COMMENT '用户头像',
  `tel` char(15) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(55) DEFAULT NULL,
  `types` tinyint(1) NOT NULL COMMENT '1:管理员;2:公司管理者;3:普通用户',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:封号;1:正常',
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `users` (`id`, `name`, `pic`, `tel`, `email`, `password`, `types`, `status`, `create_time`, `update_time`) VALUES
(1, '1234567', '/upload/head/201904/28/15564316528461.jpg', '13654248561', '359716712@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 1554253294, 1556431726),
(2, '1231237', '/upload/head/201904/28/15564303128910.jpg', '15684124511', '3396949825@qq.com', 'fcea920f7412b5da7be0cf42b8c93759', 2, 1, 1552274972, 1556430319);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


create database custom_cn; #创建中文数据库
use custom_cn;


CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL COMMENT '公司id',
  `name` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `contents` text NOT NULL COMMENT '留言板内容',
  `is_contact` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否联系:0:未联系;1:已联系',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `board` (`id`, `c_id`, `name`, `email`, `tel`, `contents`, `is_contact`, `create_time`, `update_time`) VALUES
(1, 1, '吉哲明步', '21646744@qq.com', '18451248541', '你呗v科技馆让你你不看接入他给你办公楼让你明白了个人封面美女被列入每个月 麻辣女兵经沟通伙伴们u', 0, 1554253294, 1554253294),
(2, 1, '吉个明步', '2186744@qq.com', '18451248541', '你呗v科技馆让你你不看接入他给你办公楼让你明白了个人封面美女被列入每个月 麻辣女兵经沟通伙伴们u', 0, 1554253294, 1554253294);



CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `contents` varchar(1000) NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `cases` (`id`, `user_id`, `pic`, `contents`, `create_time`, `update_time`) VALUES
(1, 2, '/upload/cases/201904/15/15552982358224.jpg', '这是悟空传的图片\n回复花几百块是基本靠两个人年份你不客观让你爸尼伯龙根让你爸难辨了你们人工费老板娘难辨了牛肉干吗发布 老板娘美国人连那好吧不能拉谷朊粉那么饱你来吧给你个魔鬼k,jk,', 1555298258, 1555313575),
(2, 2, '/upload/cases/201904/15/15552983021242.jpg', '允儿', 1555298318, 1555298318),
(3, 2, '/upload/cases/201904/15/15552985249306.jpg', '大话西游紫霞仙子', 1555298540, 1555298540),
(4, 2, '/upload/cases/201904/15/15553048595488.jpg', '我踏七彩祥云来\n', 1555304897, 1555304897),
(10, 2, '/upload/cases/201904/15/15553155722737.jpg', '成为人人发ver官方发给别人发过不甘后人发过火不然他还不如很特别你不敢符合你', 1555315577, 1555315612),
(11, 2, '/upload/cases/201904/24/15560887068914.jpg', '是而突然GV呗v土壤肥公关部根本GV他如果', 1556088711, 1556088711),
(12, 2, '/upload/cases/201904/28/15564304495869.jpg', '你看不v你不买了工人们', 1556155264, 1556430459);


CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL COMMENT '公司id',
  `name` varchar(55) NOT NULL COMMENT '评论者',
  `email` varchar(100) NOT NULL COMMENT '评论者邮箱',
  `tel` varchar(55) NOT NULL COMMENT '评论者电话',
  `pic` varchar(255) NOT NULL COMMENT '评论者头像',
  `infor_id` int(11) NOT NULL COMMENT '文章id',
  `contents` text NOT NULL COMMENT '评论内容',
  `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '0:第一级评论;其他的则为一级评论的id',
  `create_time` int(10) NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论';


INSERT INTO `comment` (`id`, `company_id`, `name`, `email`, `tel`, `pic`, `infor_id`, `contents`, `p_id`, `create_time`) VALUES
(1, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '云想衣裳花想容，春风拂槛露华浓。若非群玉山头见，会向瑶台月下逢。', 0, 1552274972),
(2, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '海客谈瀛洲，烟涛微茫信难求。越人语天姥，云霞明灭或可睹。天姥连天向天横，势拔五岳掩赤城。天台四万八千丈，对此欲倒东南倾。我欲因之梦吴越，一夜飞度镜湖月。湖月照我影，送我至剡溪。谢公宿处今尚在，渌水荡漾清猿啼。脚著谢公屐，身登青云梯。半壁见海日，空中闻天鸡。千岩万转路不定，迷花倚石忽已暝。熊咆龙吟殷岩泉，栗深林兮惊层巅。云青青兮欲雨，水澹澹兮生烟。列缺霹雳，丘峦崩摧。洞天石扉，訇然中开。青冥浩荡不见底，日月照耀金银台。霓为衣兮风为马，云之君兮纷纷而来下。虎鼓瑟兮鸾回车，仙之人兮列如麻。忽魂悸以魄动，恍惊起而长嗟。惟觉时之枕席，失向来之烟霞。世间行乐亦如此，古来万事东流水。别君去兮何时还，且放白鹿青崖间，须行即骑访名山。安能摧眉折腰事权贵，使我不得开心颜。 ', 1, 1552274972),
(3, 1, '樱井莉亚', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '海客谈瀛洲，烟涛微茫信难求。越人语天姥，云霞明灭或可睹。天姥连天向天横，势拔五岳掩赤城。天台四万八千丈，对此欲倒东南倾。我欲因', 0, 1552274972),
(4, 1, '樱井', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '搬家费v四万八千丈，对此欲倒东南倾。我欲因', 1, 1552274972),
(5, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '你看看你飞飞', 0, 1552274972),
(6, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '风格VR根本台月下逢。', 0, 1552274972),
(7, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 3, '和一体化R根本台月下逢。', 0, 1552274972),
(8, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '不然天花板风格VR根本台月下逢。', 0, 1552274972),
(9, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '风格VR扁桃仁火锅根本台月下逢。', 0, 1552274972),
(10, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '本托管人和格VR根本台月下逢。', 0, 1552274972),
(11, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '不同用户你风格VR根本台月下逢。', 0, 1552274972),
(13, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '是分大V人更方便R根本台月下逢。', 5, 1552274972),
(18, 1, '吉哲明步', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, 'VB让他改变被告人犯。VB个人还不如', 3, 1552274972),
(22, 1, '123123', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '北国饭店吧你嘎哈呢个发你吧,个人体会过呗v他如果和,二个人同一个霍比特人然后', 1, 1555651863),
(23, 1, '123123', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, '是各投入那个卡里不明白你了和他们 ', 3, 1555652268),
(28, 1, '123123', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, 'GV儿童GV不然她给你搬', 6, 1555653313),
(29, 1, '123123', '', '', '/upload/infor/201904/17/15554938186340.jpg', 4, 'HYTJJYT', 6, 1555911692),
(30, 1, '123123', '', '', '/upload/head/201904/23/15559881133984.jpg', 4, '1111111', 11, 1556012098),
(31, 1, '123123', '', '', '/upload/head/201904/23/15559881133984.jpg', 4, '222222222222222', 10, 1556066602),
(32, 1, '123123', '', '', '/upload/head/201904/23/15559881133984.jpg', 4, '333333333', 9, 1556067644),
(33, 1, '123123', '', '', '/upload/head/201904/23/15559881133984.jpg', 3, '2124854', 7, 1556075944),
(34, 1, '123123', '', '', '/upload/head/201904/23/15559881133984.jpg', 3, 'bvrgb brtghbrty', 7, 1556082587),
(37, 1, '123123', '', '', '/upload/head/201904/24/15560885888106.jpg', 4, 'bgrthtbnrtyh', 3, 1556155813);


CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(255) NOT NULL COMMENT '公司名称',
  `info` varchar(1000) NOT NULL COMMENT '公司介绍',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `email` varchar(55) NOT NULL COMMENT '公司邮箱',
  `address` varchar(255) NOT NULL COMMENT '公司地址',
  `create_time` int(10) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `company` (`id`, `user_id`, `name`, `info`, `tel`, `email`, `address`, `create_time`, `update_time`) VALUES
(1, 2, '大连易家科技11', '你说你想要逃,偏偏注定咬不咬', '13624258110', '359716712@qq.com', '海外学子创业园', 1554888850, 1556430359);



CREATE TABLE `honor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `contents` varchar(1000) NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `honor` (`id`, `user_id`, `pic`, `contents`, `create_time`, `update_time`) VALUES
(1, 2, '/upload/honor/201904/15/15553153236631.jpg', '分GV了吗 不是没人了给她买个不', 1555315338, 1555315338),
(2, 2, '/upload/honor/201904/15/15553153236631.jpg', '分GV了吗 不是没人了给她买个不吧发给你被告人 ', 1555315436, 1555315436),
(4, 2, '/upload/honor/201904/15/15553177121121.jpg', '给他如果还让他', 1555317714, 1555317714),
(5, 2, '/upload/honor/201904/16/15553760378316.jpg', '你离开的父母喵了个咪', 1555376044, 1555376044),
(7, 2, '/upload/honor/201904/28/15564304717560.jpg', '就体育局金屠妖节', 1556430474, 1556430474);



CREATE TABLE `infor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `intro` varchar(1000) NOT NULL COMMENT '文章概述',
  `contents` text NOT NULL COMMENT '具体内容',
  `create_time` int(10) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `infor` (`id`, `user_id`, `title`, `pic`, `intro`, `contents`, `create_time`, `update_time`) VALUES
(2, 2, '你要回家你', '/upload/infor/201904/17/15554673339235.jpg', '不天人合一', '你和他就那样你和他<img src=\"/static/upload/infor/201904/17/15554673421457.jpg\" alt=\"15554673421457.jpg\">', 1555467345, 1555467345),
(3, 2, '你话题或', '/upload/infor/201904/17/15554938186340.jpg', '不给他人那好吧', '你有人他家能你和他你<img src=\"/static/upload/infor/201904/17/15554938275467.jpg\" alt=\"15554938275467.jpg\">', 1555493830, 1555493830),
(4, 2, '不光荣榜', '/upload/infor/201904/17/15554940459199.jpg', '不VR特别吧个人版吧个人版和不甘人后吧不光荣榜办公厅不闹腾给别人不能让他不然她给你搬本托管人你白天让你爸吧不通风管很牛逼办公厅发布内容太不然她被害人办公厅不能不敢让他还不如吧通过很牛逼不通过你不糖尿病不闹腾过年半年报不VR特别吧个人版吧个人版和不甘人后吧不光荣榜办公厅不闹腾给别人不能让他不然她给你搬本托管人你白天让你爸吧不通风管很牛逼办公厅发布内容太不然她被害人办公厅不能不敢让他还不如吧通过很牛逼不通过你不糖尿病不闹腾过年半年报不VR特别吧个人版吧个人版和不甘人后吧不光荣榜办公厅不闹腾给别人不能让他不然她给你搬本托管人你白天让你爸吧不通风管很牛逼办公厅发布内容太不然她被害人办公厅不能不敢让他还不如吧通过很牛逼不通过你不糖尿病不闹腾过年半年报不VR特别吧个人版吧个人版和不甘人后吧不光荣榜办公厅不闹腾给别人不能让他不然她给你搬本托管人你白天让你爸吧不通风管很牛逼办公厅发布内容太不然她被害人办公厅不能不敢让他还不如吧通过很牛逼不通过你不糖尿病不闹腾过年半年报不VR特别吧个人版吧个人版和不甘人后吧不光荣榜办公厅不闹腾给别人不能让他不然她给你搬本托管人你白天让你爸吧不通风管很牛逼办公厅发布内容太不然她被害人办公厅不能不敢让他还不如吧通过很牛逼不通过你不糖尿病不闹腾过年半年报不VR特别吧个人版吧个人版和不甘人后吧不光荣榜办公厅不闹腾给别人不能让他不然她给你搬本托管人你白天让你爸吧不通风管很牛逼办公厅发布内容太不然她被害人办公厅不能不敢让他还不如吧通过很牛逼不通过你不糖尿病不闹腾过年半年报不VR特别吧个人版吧个人版和不甘人后吧不光荣榜办公厅不闹腾给别人不能让他不然她给你搬本托管人你白天让你爸吧不通风管很牛逼办公厅发布内容太不然她被害人办公厅不能不敢让他还不如吧通过很牛逼不通过你不糖尿病不闹腾过年半年报', '<p>是发呗v你 你不太好弄</p><p>不然天花板</p><p><img src=\"/static/upload/infor/201904/17/15554940678255.jpg\" alt=\"15554940678255.jpg\"><br></p>', 1555494075, 1555494075);

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL COMMENT '公司id',
  `name` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `contents` text NOT NULL COMMENT '询盘内容',
  `is_contact` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已联系:0:未联系;1:已联系;',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `inquiry` (`id`, `c_id`, `name`, `email`, `tel`, `contents`, `is_contact`, `create_time`, `update_time`) VALUES
(1, 1, '向南往北飞', '561247854@qq.com', '13648541245', '恨不能看哈不见附件女客服呢度你不看给你你不看如果您把\r\n尼伯龙根都发你吧你不看个人呢,IE后入GV不开放都不敢你不看VR给你', 1, 1552274972, 1552274972),
(2, 1, '办公费根本', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(3, 1, '个不放过', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(4, 1, '不耐烦', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(5, 1, '哪天高耗能', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(6, 1, '你不同用户', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(7, 1, '你不同意大哥', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(8, 1, '哥不让他给', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(9, 1, '服务费个', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972),
(10, 1, '隔断柜古风歌', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 1, 1552274972, 1552274972),
(11, 1, '呗v如果', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 1, 1552274972, 1552274972),
(12, 1, '个人头哥', '84561854@qq.com', '13648541247', '北飞是飞得更高呗v呗v发', 0, 1552274972, 1552274972);



CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `pic` varchar(255) NOT NULL COMMENT '产品图片',
  `price` int(10) NOT NULL COMMENT '价格',
  `mode` varchar(55) NOT NULL COMMENT '采购方式',
  `origin` varchar(55) NOT NULL COMMENT '原产地',
  `date` date NOT NULL COMMENT '生产日期',
  `logistics` varchar(55) NOT NULL COMMENT '物流方式',
  `address` varchar(255) NOT NULL COMMENT '发货地址',
  `intro` text NOT NULL COMMENT '产品简介',
  `details` text NOT NULL COMMENT '产品详情',
  `create_time` int(10) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `product` (`id`, `user_id`, `name`, `pic`, `price`, `mode`, `origin`, `date`, `logistics`, `address`, `intro`, `details`, `create_time`, `update_time`) VALUES
(5, 2, '报告分部报告gvrkjhgn', '/upload/product/201904/17/15554650556136.jpg', 656557, 'vfgreg', 'bgrthb', '2019-04-09', 'NGHF', '见面会有机会', '木有挂机吗', '没回家没好好毕业后让他<img src=\"/static/upload/product/201904/17/15554650986948.jpg\" alt=\"15554650986948.jpg\">', 1555465112, 1555893691),
(6, 2, 'hn好友bvtrgbvb没喇叭沟门', '/upload/product/201904/17/15554652289210.jpg', 55, '车份儿', '北国饭店', '2019-04-01', '办公费', '把那个放牛班', '吧个发你吧', '办公费给你搬', 1555465249, 1555660948),
(7, 2, '欧冠人挤人混凝土很牛逼', '/upload/product/201904/22/15558945732674.jpg', 554, '个人各吧', '分工不好男人', '2019-04-01', '不甘人后吧', '不让发高回报', '别人官方还不如', '不认可女看热闹<img src=\"/static/upload/product/201904/22/15558946046299.jpg\" alt=\"15558946046299.jpg\">', 1555894607, 1555894620),
(8, 2, 'vfergv', '/upload/product/201904/22/15558973115077.jpg', 55, 'vrtghb', 'bhrty墨镜', '2019-04-02', '不然根本', '那边', '你不跟他好怀念', '能听你话', 1555897330, 1555897330),
(9, 2, '你合同工', '/upload/product/201904/22/15558973385150.jpg', 23, '南京条约', '就那样太好几年', '2019-04-04', '你不太好弄', '不闹腾银黄胶囊', '哪天遇见你面积好久没', '不容易头发好几年你好好干哈妇女节', 1555897357, 1555897357),
(10, 2, '你和他云集', '/upload/product/201904/22/15558973647902.jpg', 556, '不同一句话', '内田有纪', '2019-04-04', '你不会他家能', '你和他给你见', '你不听话遇见你', '哪天和你南海姑娘<img src=\"/static/upload/product/201904/22/15558973878141.jpg\" alt=\"15558973878141.jpg\">', 1555897390, 1555897390),
(12, 2, '1124501', '/upload/product/201904/28/15564294529025.jpg', 45415, '45415151', '11111', '2019-04-08', '222222', '333333', '那一条街呢哪天有好几年你和他好几年', '<p>哪天遇见你他你不突然有内涵</p><p>不如让他和内容太阳花还不如同一伙人然后呢吧<img src=\"/static/upload/product/201904/24/15560886624319.jpg\" alt=\"15560886624319.jpg\"></p>', 1556088672, 1556429454);



CREATE TABLE `website_pic` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL COMMENT '公司logo',
  `weibo` varchar(255) NOT NULL COMMENT '公司微博',
  `wechat` varchar(255) NOT NULL COMMENT '微信',
  `taobao` varchar(255) NOT NULL COMMENT '淘宝',
  `banner` varchar(1000) NOT NULL COMMENT '首页轮播图',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `website_pic` (`id`, `user_id`, `logo`, `weibo`, `wechat`, `taobao`, `banner`, `create_time`, `update_time`) VALUES
(1, 2, '/upload/logo/201904/28/15564303688523.jpg', '/upload/weibo/201904/28/15564303722407.jpg', '/upload/wechat/201904/28/15564303769306.jpg', '/upload/taobao/201904/28/15564303847133.jpg', ';/upload/banner/201904/28/15564304181439.jpg;/upload/banner/201904/28/15564304208922.jpg;/upload/banner/201904/28/15564304207788.jpg;/upload/banner/201904/28/15564304206228.jpg', 1554971242, 1556430420),
(2, 3, '/upload/logo/201904/23/15560050733130.jpg', '/upload/weibo/201904/23/15560050826282.jpg', '/upload/wechat/201904/23/15560050864733.jpg', '/upload/taobao/201904/23/15560050914543.jpg', '', 1556005073, 1556005091);


ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);


ALTER TABLE `honor`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `infor`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `website_pic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);


ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;


ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `infor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `website_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


create database custom_de   # 德语数据库
create database custom_en   # 英语数据库
create database custom_es	# 西班牙语数据库
create database custom_fr	# 法语数据库
create database custom_ja	# 日语数据库
create database custom_ko	# 韩语数据库
create database custom_py	# 葡萄与数据库
create database custom_ru	# 俄语数据库


