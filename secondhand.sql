CREATE DATABASE  IF NOT EXISTS `secondhand` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `secondhand`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: secondhand
-- ------------------------------------------------------
-- Server version	5.5.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `photourl` varchar(45) DEFAULT 'img/logo.png',
  `class` smallint(6) DEFAULT '0',
  `usernum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (8,'独立音乐','这是一个独立音乐的小组，如果你喜欢赵雷，何欣穗，迷笛，草莓，逃跑，万青，痛仰，那就来吧','img/logo.png',5,5),(9,'操作系统','好悲催呀，操作系统太难了，还都是英文的课本','img/logo.png',2,3),(10,'同济大学','这里是上海，这里是同济','img/logo.png',1,3),(11,'我们都有拖把收集癖','没办法，这是个毛病，但暂时改不了了','img/logo.png',4,4),(12,'我们什么都知道……一点儿','日语的几个假名，模仿一下伦敦腔，猫的饮食禁忌，动漫美剧TVB，绘本和好听的曲，初级摄影技巧和电脑各种软件，广告学和一点点法律……还有各种各种小tip，只爱皮毛，不爱深挖。 \r\n说穿了，我就是一个虚荣心强的懒家伙。你们呢? ','img/logo.png',5,2),(13,'我要去台湾','去台湾，是我17岁的梦想 到台湾，我是24岁的11天生活。','img/logo.png',4,2),(14,'软件学院','都是大软院的人，何苦相煎太急','img/logo.png',1,2),(15,'我总觉得自己就是一个傻逼','经常经常我会觉得自己是在犯傻天神经质一样的想这想那。最主要是born to lose，还完全没心眼！ \r 真不知道这一切应该怎么办，我还能这么过多久，还有受多少刺激。 ','img/logo.png',4,3),(16,'蓝色大门|和Ta有关的青春','大学时候经常画油画，法学系的我却在艺术系的画室里呆更长的时间。一个小师妹对我照顾有加，总是帮我蒙哄老师说我是外班旁听生。在那些静默的午后，如同现在一般的时辰，画下第一抹色彩。','img/logo.png',4,2),(17,'一二手相机市场','本组仅限摄影相关器材、用品交易贴！谢绝其他物品出售帖。谢谢配合！ \r\n温情提醒 出机器请上图 数码机请标注快门次数 ','img/logo.png',3,2),(18,'有故事的人才听懂心里的歌儿  ','似水流年才是一个人的一切 其余的全是片刻的欢娱和不幸 \r\n宁愿用这一生等你发现 我一直在你身边从未走远... ','img/logo.png',5,1),(19,'我们都是图片控 ','就随便一看 ','img/logo.png',5,1),(20,'看起来就是比你们年轻','开玩笑嘛','img/logo.png',5,1),(21,'狂愛TVB ','傻孩子','img/logo.png',5,1),(22,'我要去香港','我现在不在香港','img/logo.png',5,2),(23,'我要学粤语 ','我现在不太会说粤语','img/logo.png',5,2),(24,'计算机网络结构','就是这么蛋逼','img/logo.png',2,0),(25,'大乔小乔','他们的歌很好听的说','img/logo.png',5,1);
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sendid` int(11) NOT NULL,
  `receiveid` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_mail_user1` (`sendid`),
  KEY `fk_mail_user2` (`receiveid`),
  CONSTRAINT `fk_mail_user1` FOREIGN KEY (`sendid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mail_user2` FOREIGN KEY (`receiveid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail`
--

LOCK TABLES `mail` WRITE;
/*!40000 ALTER TABLE `mail` DISABLE KEYS */;
INSERT INTO `mail` VALUES (13,6,5,'我想买你的计算机组成原理','可以卖给我吗','2013-06-04 11:46:13',1),(14,6,5,'帮帮忙啦','好不好啦','2013-06-04 11:44:00',1),(15,7,6,'你好你好','哈哈哈哈','2013-06-04 10:21:51',0),(16,8,7,'还记得那首歌吗','我依然嗨记得呢','2013-06-04 10:33:34',0),(17,9,7,'LZ求勾搭','同在嘉定','2013-06-04 10:38:07',0),(18,9,6,'你没有想卖的东西呀','为嘛','2013-06-04 11:44:22',2),(19,10,8,'我买给你吧','你买吗','2013-06-04 11:17:58',0),(20,5,6,'可以可以','马上给你送过切','2013-06-04 11:43:54',2),(21,5,6,'看到啦','马上','2013-06-04 11:43:48',2),(22,5,9,'因為ex, 我愛上麻醬麵~','嘻嘻 ','2013-06-04 11:21:20',0),(23,6,7,'知道啦','大冰','2013-06-04 11:44:51',1);
/*!40000 ALTER TABLE `mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thing`
--

DROP TABLE IF EXISTS `thing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `class` smallint(6) DEFAULT '0',
  `description` varchar(3000) NOT NULL,
  `photourl` varchar(45) DEFAULT 'img/logo.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thing`
--

LOCK TABLES `thing` WRITE;
/*!40000 ALTER TABLE `thing` DISABLE KEYS */;
INSERT INTO `thing` VALUES (5,'计算机组成原理',1,'张晨曦著的书，很厉害的一个人，很厉害的一本书','img/logo.png'),(6,'Github客户端',2,'瞎胡闹的，别认真','img/logo.png'),(7,'拖把',3,'这是个好东西，生活必备有木有，你们不觉得很重要吗','img/logo.png'),(8,'魔方',3,'以前世界冠军十秒转出来的那个魔方，超级屌有木有','img/logo.png'),(9,'平如美棠',1,'饶平如和美棠的故事','img/logo.png'),(10,'中国化的日本',1,'“日本化”曾是代表日本制造业水平高超的标志性词汇，是指美欧陷于疲态的制造业竞相采用日本式品质管理方法来生产经营。','img/logo.png'),(11,'念慈庵枇杷膏',3,'京都念慈庵杷膏 很好喝~~','img/logo.png'),(12,'Polaroid OneStep[彩虹机',2,'彩虹机\r SX70的简化版\r ','img/logo.png'),(13,'bookdarts',1,'世界上最好用的书签。','img/logo.png'),(14,'火漆印',1,'火漆印是用松脂和石蜡加颜料制成的物质，稍加热就融化，并有黏性，用来封瓶口、信件等。 ','img/logo.png'),(15,'本能：突破瓶颈，改变命运',1,'本能是人本来就有的一种能力，与生俱来，人人都有','img/logo.png'),(16,'没有人给他写信的上校',1,'五十六年了，上校唯一做过的事情就是等待。','img/logo.png'),(17,'辣白菜炒饭',4,'泡菜切小片，肉切丁，葱切段，鸡蛋煎成荷包蛋。','img/logo.png'),(18,'麻酱面',4,'主料：面条(干切面)(150克) 　　','img/logo.png');
/*!40000 ALTER TABLE `thing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thingcomment`
--

DROP TABLE IF EXISTS `thingcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thingcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` varchar(1000) NOT NULL,
  `userid` int(11) NOT NULL,
  `thingid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_thingcomment_user1` (`userid`),
  KEY `fk_thingcomment_thing1` (`thingid`),
  CONSTRAINT `fk_thingcomment_thing1` FOREIGN KEY (`thingid`) REFERENCES `thing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_thingcomment_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thingcomment`
--

LOCK TABLES `thingcomment` WRITE;
/*!40000 ALTER TABLE `thingcomment` DISABLE KEYS */;
INSERT INTO `thingcomment` VALUES (11,'2013-06-04 09:58:01','其实也蛮好的',5,6),(12,'2013-06-04 10:00:59','我们这学期用的就是这本书，好想买',6,5),(13,'2013-06-04 10:04:44','广西师范大学出版社的，有信誉',6,9),(14,'2013-06-04 10:17:15','第一次知道这个是在小学同学家里，她怕我跟她要就骗我说这个特别苦然后装出一副苦逼的样子咽下了一口，哼！',7,11),(15,'2013-06-04 10:23:39','改造过一台 挺好用 比起sx-70要快捷一些 不用对焦什么的',7,12),(16,'2013-06-04 10:23:57','真的想买一个，但是怎么养呢 哎`',7,8),(17,'2013-06-04 10:31:11','用钢笔写字的人才是懂得生活的人。',8,6),(18,'2013-06-04 10:31:51','真读书人都会喜欢的。青铜的真漂亮啊。。',8,13),(19,'2013-06-04 10:32:06','然世界的创意总是走在我的前头，我还琢磨着自己做一个这种书签呢 ',8,12),(20,'2013-06-04 10:32:59','最好自己去定制，淘宝的有点太粗糙。如果只是闹着玩淘宝的完全能满足你的需求',8,14),(21,'2013-06-04 10:41:25','人生而不平等，人的身高、体重、外貌、家庭出身不尽相同，但每个人的本能都是一样的。',9,15),(22,'2013-06-04 10:42:26','怎么没人说这本书',9,10),(23,'2013-06-04 10:42:59','其实我想说说爱情。 《上校》当然不是一本爱情小说。它讲的是一个七十多岁的老上校，有一个妻子、一个死掉的儿子，和一只瘦骨嶙峋、没有遮护的斗鸡。',9,16),(24,'2013-06-04 11:18:16','吃了20余年还是喜欢的紧。我妈说：调麻酱去~搬个小板凳我就调开了',10,11),(25,'2013-06-04 11:18:31','姥姥家的味道。',10,18),(26,'2013-06-04 11:18:37','必须全部是蒜！！！！！！！',10,18),(27,'2013-06-04 11:18:49','麻酱什么的最喜欢了。',10,18),(28,'2013-06-04 11:18:55','麻酱总是那么好吃',10,18),(29,'2013-06-04 11:19:24','吃了20余年还是喜欢的紧。我妈说：调麻酱去~搬个小板凳我就调开了 ',10,10),(30,'2013-06-04 11:20:09','夏天最爱',5,18),(31,'2013-06-04 11:20:16','最爱麻酱凉皮',5,18),(32,'2013-06-04 11:23:14','第一次知道这个是在小学同学家里，她怕我跟她要就骗我说这个特别苦然后装出一副苦逼的样子咽下了一口，哼！ ',5,11),(33,'2013-06-04 11:23:21','好久不见 \n你怎么舍得我难过 ',5,11),(34,'2013-06-04 11:23:38','本人有一本，谁想买',5,15),(35,'2013-06-04 11:48:12','在四川这个叫做串串香！',6,18),(36,'2013-06-04 11:48:19','现在已经不敢随便在街头吃了。。虽然很想吃',6,18),(37,'2013-06-04 11:48:44','吃的都是回忆好么混蛋！',9,18),(38,'2013-06-04 11:48:54','喜欢拿着篮子挑选食物时的幸福感~~ ',9,18),(39,'2013-06-04 11:49:02','昨天听到一个人说，当一种食物不好吃的时候，他就会用辣椒和醋去掩盖他的味道。猛然间反应过来我对食物的要求和鉴赏是多么肤浅-----仅辣和酸就够了。这就是为什么我曾觉得米饭拌辣椒和醋是多好吃的东西。戒掉吧~',9,18),(40,'2013-06-04 11:49:13','在四川，这是再普通和便宜不过的美食，火锅的简易版。小时候吃了很多很多，有时会拿个空碗到附近路边摊去端回家来，看着电视慢慢享用。来了北京之后，尝试了几次，不再吃北京的任何麻辣烫了。要知道麻辣烫的麻来自花椒而不是麻酱啊！',9,18);
/*!40000 ALTER TABLE `thingcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `time` datetime NOT NULL,
  `replynum` int(11) DEFAULT '0',
  `userid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_topic_user1` (`userid`),
  KEY `fk_topic_group1` (`groupid`),
  CONSTRAINT `fk_topic_group1` FOREIGN KEY (`groupid`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_topic_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic`
--

LOCK TABLES `topic` WRITE;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` VALUES (23,'小组第一个话题','我烧饼油条是第一个额','2013-06-04 17:53:40',6,5,8,'2013-06-04 11:46:07'),(24,'我该说些什么好呢','又是第一个，唉','2013-06-04 17:55:39',2,5,9,'2013-06-04 11:32:33'),(25,'我也发个言吧','要么太冷清了','2013-06-04 17:59:17',2,6,8,'2013-06-04 11:32:05'),(26,'都来说说你最近买拖把是什么时候吧','LZ先说，LZ是昨天刚刚买的哦！！！','2013-06-04 18:02:23',1,6,11,'2013-06-04 10:05:35'),(27,'我也是同济的，不过在嘉定','这里好荒凉呀','2013-06-04 18:06:02',1,7,10,'2013-06-04 10:37:50'),(28,'健康和理想哪个重要？','理想可以是一个家庭，一份爱情，一份喜爱的工作，也可以是能够随心所欲的自由。 \r\n健康，只是身体完全不担心生病，和年老，和孤独。 \r\n在现实生活中，我们都有压力和感情纠纷，这必然不会获得完全的健康，可如果只追求健康，你也许要放弃很多，包括亲人，爱人，事业。 \r\n当这些矛盾出现了，你们会如何选择呢？','2013-06-04 18:18:47',1,7,12,'2013-06-04 11:32:15'),(29,'如果中国人是某些人口中的猪','和人辩论，一路上我不满他的精英主义。所以勉强站在对立面辩了一地。最后被人身攻击，说生活在中国土地上的是肉猪。什么都不懂。 \r\n我就生气了。豆瓣是中国人创造的，中华文字是中国创造的，你特么还用这些猪创造的东西干嘛？ ','2013-06-04 18:19:38',1,7,11,'2013-06-04 10:24:47'),(30,'南京八月中旬自由行，有同去的么？','十天左右的行程','2013-06-04 18:20:37',1,7,13,'2013-06-04 11:23:58'),(31,'黄金极品！！激情时刻','自习室的奇葩！！！！！老娘做他们后面！！！要死了要死了！！！！一直腻味着。。。。。。活不了了','2013-06-04 18:28:09',2,8,9,'2013-06-04 11:42:05'),(32,'总有人会记得，历史总会延续。','我们相信中国的言论管制不会持续百年，总有解禁的那一天。我们等待着那一天的到来。','2013-06-04 18:34:55',1,8,15,'2013-06-04 11:22:42'),(33,'你有没有试过百度自己的名字','我试过。。都是自己的资料。。\r\n有种完全暴露的感觉。。真不开森。。','2013-06-04 18:35:39',1,8,9,'2013-06-04 11:31:54'),(34,'十八岁的象征意义远大于生日带来的狂喜','我该怎么去度过我的十八岁生日呢','2013-06-04 18:39:47',1,9,16,'2013-06-04 11:31:45'),(35,'自说自话吧','我不是不女人 只是想以朋友的姿态更长久的和你在一起 别人可以说我是个汉子 但是你怎么可以不懂？','2013-06-04 18:44:06',0,9,18,'2013-06-04 10:44:06'),(36,'有人陪我一起固执吗？','RT \r\n期待遇见同样固执的你 \r\n相互理解 诉说彼此的故事 \r\n结交最别致的朋友 \r\n在这里倾诉属于自己的偏执 ','2013-06-04 18:45:45',0,10,8,'2013-06-04 10:45:45'),(37,'唯美清新图库','地址如下','2013-06-04 18:46:37',0,10,19,'2013-06-04 10:46:37'),(38,'大软院威武','哈哈哈','2013-06-04 19:21:47',1,5,14,'2013-06-04 11:31:26'),(39,'有没有一首歌让你听着就会心疼','没关系你也不用给我机会\r\n反正我还有一生可以浪费','2013-06-04 19:22:19',1,5,15,'2013-06-04 11:31:17'),(40,'白素贞，快来','没人呀','2013-06-04 19:32:53',1,5,17,'2013-06-04 11:32:59'),(41,'喜欢拿着篮子挑选食在四川物时的幸福感~~','啊啊啊啊啊啊啊啊','2013-06-04 19:58:14',0,9,16,'2013-06-04 11:58:14');
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellthing`
--

DROP TABLE IF EXISTS `sellthing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sellthing` (
  `userid` int(11) NOT NULL,
  `thingid` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `fk_sellthing_user1` (`userid`),
  KEY `fk_sellthing_thing1` (`thingid`),
  CONSTRAINT `fk_sellthing_thing1` FOREIGN KEY (`thingid`) REFERENCES `thing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sellthing_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellthing`
--

LOCK TABLES `sellthing` WRITE;
/*!40000 ALTER TABLE `sellthing` DISABLE KEYS */;
INSERT INTO `sellthing` VALUES (5,5,'2013-06-04 09:57:02'),(5,6,'2013-06-04 09:57:49'),(7,6,'2013-06-04 10:17:42'),(7,5,'2013-06-04 10:21:34'),(8,7,'2013-06-04 10:30:29'),(8,6,'2013-06-04 10:30:42'),(8,12,'2013-06-04 10:32:16'),(8,14,'2013-06-04 10:32:45'),(9,11,'2013-06-04 10:41:37'),(9,5,'2013-06-04 10:41:43'),(9,8,'2013-06-04 10:41:57'),(9,9,'2013-06-04 10:42:07'),(9,16,'2013-06-04 10:42:48'),(10,18,'2013-06-04 11:14:31'),(10,8,'2013-06-04 11:17:38'),(10,12,'2013-06-04 11:17:43'),(5,7,'2013-06-04 11:22:51'),(5,15,'2013-06-04 11:23:28'),(6,9,'2013-06-04 11:47:36');
/*!40000 ALTER TABLE `sellthing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(45) NOT NULL,
  `photourl` varchar(45) DEFAULT 'img/logo.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'烧饼油条','zhenyangchu@gmail.com','123','img/logo.png'),(6,'凉皮煎饼','zhenyangchu@qq.com','123','img/logo.png'),(7,'大冰','zhenyangchu@hotmail.com','123','img/logo.png'),(8,'赵小雷','zhenyangchu@163.com','123','img/logo.png'),(9,'好妹妹爱白素贞','zhenyangchu@126.com','123','img/logo.png'),(10,'大乔小乔','zhenyangchu@ymail.com','123','img/logo.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroup` (
  `userid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  KEY `fk_usergroup_user1` (`userid`),
  KEY `fk_usergroup_group1` (`groupid`),
  CONSTRAINT `fk_usergroup_group1` FOREIGN KEY (`groupid`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usergroup_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergroup`
--

LOCK TABLES `usergroup` WRITE;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` VALUES (5,8),(5,9),(6,10),(6,8),(6,11),(7,11),(7,10),(7,12),(7,8),(7,13),(8,11),(8,9),(8,14),(8,15),(9,10),(9,11),(9,8),(9,16),(9,17),(9,18),(10,9),(10,8),(10,19),(10,20),(10,21),(10,22),(10,23),(10,25),(5,14),(5,15),(5,13),(5,16),(5,12),(5,17),(9,22),(9,23),(9,15);
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topicreply`
--

DROP TABLE IF EXISTS `topicreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topicreply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_topicreply_user1` (`userid`),
  KEY `fk_topicreply_topic1` (`topicid`),
  CONSTRAINT `fk_topicreply_topic1` FOREIGN KEY (`topicid`) REFERENCES `topic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_topicreply_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topicreply`
--

LOCK TABLES `topicreply` WRITE;
/*!40000 ALTER TABLE `topicreply` DISABLE KEYS */;
INSERT INTO `topicreply` VALUES (45,'继续顶，没人吗','2013-06-04 09:56:04',5,23),(46,'继续顶，没人吗','2013-06-04 09:56:04',5,23),(47,'我来了，我前天买的，lx呢','2013-06-04 10:05:35',7,26),(48,'没有绝对的。','2013-06-04 10:19:06',7,25),(49,'放屁','2013-06-04 10:24:47',8,29),(50,'顶LZ，我是第二个','2013-06-04 10:27:27',8,24),(51,'傻X','2013-06-04 10:35:15',8,31),(52,'我住8号楼，LZ呢','2013-06-04 10:37:50',9,27),(53,'我来也','2013-06-04 10:38:32',9,23),(54,'我们都是固执的傻瓜...','2013-06-04 10:45:27',10,23),(55,'那一天不会来的','2013-06-04 11:22:42',5,32),(56,'我不会去的','2013-06-04 11:23:58',5,30),(57,'暂时没有','2013-06-04 11:31:17',5,39),(58,'的确，我爱软院','2013-06-04 11:31:26',5,38),(59,'我顶','2013-06-04 11:31:34',5,23),(60,'对呀，说的真好','2013-06-04 11:31:45',5,34),(61,'我试过，特傻逼','2013-06-04 11:31:54',5,33),(62,'真的吗','2013-06-04 11:32:05',5,25),(63,'健康吧','2013-06-04 11:32:15',5,28),(64,'我是第三个','2013-06-04 11:32:33',5,24),(65,'快点','2013-06-04 11:32:59',5,40),(66,'同LS','2013-06-04 11:42:05',5,31),(67,'我也是','2013-06-04 11:46:07',6,23);
/*!40000 ALTER TABLE `topicreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buything`
--

DROP TABLE IF EXISTS `buything`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buything` (
  `userid` int(11) NOT NULL,
  `thingid` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `fk_buything_user1` (`userid`),
  KEY `fk_buything_thing1` (`thingid`),
  CONSTRAINT `fk_buything_thing1` FOREIGN KEY (`thingid`) REFERENCES `thing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_buything_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buything`
--

LOCK TABLES `buything` WRITE;
/*!40000 ALTER TABLE `buything` DISABLE KEYS */;
INSERT INTO `buything` VALUES (6,7,'2013-06-04 10:00:43'),(6,8,'2013-06-04 10:03:23'),(7,11,'2013-06-04 10:17:19'),(7,7,'2013-06-04 10:17:36'),(7,12,'2013-06-04 10:21:26'),(7,8,'2013-06-04 10:24:01'),(8,10,'2013-06-04 10:30:37'),(8,13,'2013-06-04 10:31:41'),(9,15,'2013-06-04 10:41:12'),(9,6,'2013-06-04 10:41:47'),(9,10,'2013-06-04 10:42:13'),(10,7,'2013-06-04 11:17:33'),(5,11,'2013-06-04 11:19:52'),(5,18,'2013-06-04 11:20:20');
/*!40000 ALTER TABLE `buything` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-04 20:00:49
