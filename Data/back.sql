/*
SQLyog Ultimate v11.25 (64 bit)
MySQL - 5.6.17 : Database - easycms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`easycms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `easycms`;

/*Table structure for table `easy_access` */

DROP TABLE IF EXISTS `easy_access`;

CREATE TABLE `easy_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `easy_access` */

insert  into `easy_access`(`role_id`,`node_id`,`level`,`module`) values (7,57,3,''),(7,56,2,''),(7,15,3,''),(7,2,2,''),(7,19,3,''),(7,3,2,''),(7,24,3,''),(7,4,2,''),(7,32,3,''),(7,7,2,''),(7,35,3,''),(7,8,2,''),(7,39,3,''),(7,9,2,''),(7,46,3,''),(7,10,2,''),(7,47,3,''),(7,11,2,''),(7,62,2,''),(7,1,1,'');

/*Table structure for table `easy_article` */

DROP TABLE IF EXISTS `easy_article`;

CREATE TABLE `easy_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(10) unsigned NOT NULL,
  `title` varchar(40) NOT NULL,
  `source` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `pubtime` int(10) unsigned NOT NULL,
  `summary` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `approval` int(10) unsigned NOT NULL,
  `opposition` int(10) unsigned NOT NULL,
  `iscommend` tinyint(1) unsigned NOT NULL,
  `ispush` tinyint(1) unsigned NOT NULL,
  `isslides` tinyint(1) unsigned NOT NULL,
  `islock` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

/*Data for the table `easy_article` */

insert  into `easy_article`(`article_id`,`tid`,`title`,`source`,`author`,`keyword`,`pubtime`,`summary`,`content`,`approval`,`opposition`,`iscommend`,`ispush`,`isslides`,`islock`) values (64,73,'回调上攻','','','回调上攻',1432164448,'回调上攻','回调上攻',0,0,0,0,0,0),(65,73,'双底突破','','','双底突破',1432164471,'双底突破','',0,0,0,0,0,0),(66,73,'三底突破','','','三底突破',1432164483,'三底突破','',0,0,0,0,0,0),(67,73,'两阳夹一阴','','','两阳夹一阴',1432164496,'两阳夹一阴','',0,0,0,0,0,0),(68,73,'其他模式','baidu','admin','其他模式',1432164512,'其他模式','',0,0,0,0,0,0),(63,73,'上涨概率排行榜','baidu','admin','上涨概率排行榜',1432164039,'上涨概率排行榜','<table width=\"727\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">          <tbody><tr bgcolor=\"#B0C1E3\">            <td><table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"6\">              <tbody><tr class=\"white\">                <td width=\"10%\" height=\"30\" align=\"center\" bgcolor=\"#4c73c1\">股票代码</td>                <td width=\"11%\" height=\"30\" align=\"center\" bgcolor=\"#4c73c1\">股票简称</td>                <td width=\"15%\" bgcolor=\"#4c73c1\">10月25日收盘价</td>                <td width=\"16%\" align=\"center\" bgcolor=\"#4c73c1\">5日涨幅超过<br />                  5%的概率</td>                <td width=\"16%\" align=\"center\" bgcolor=\"#4c73c1\">10日涨幅超过<br />                  5%的概率</td>                <td width=\"16%\" align=\"center\" bgcolor=\"#4c73c1\">10日涨幅超过<br />                  5%的概率</td>                <td width=\"16%\" align=\"center\" bgcolor=\"#4c73c1\">10日涨幅超过<br />                  10%的概率</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600036</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">招商银行</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">13.58</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600019</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">宝钢股份</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">5.8</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600028</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中国石化</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">4.3</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600030</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中信证券</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.9</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600050</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中国联通</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">3.7</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600115</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">东方航空</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.1</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600019</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">宝钢股份</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">5.8</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600028</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中国石化</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">4.3</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600030</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中信证券</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.9</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600050</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中国联通</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">3.7</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600115</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">东方航空</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.1</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>                </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600019</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">宝钢股份</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">5.8</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600028</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中国石化</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">4.3</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600030</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中信证券</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.9</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600050</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">中国联通</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">3.7</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600115</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">东方航空</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.1</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600115</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">东方航空</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.1</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600115</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">东方航空</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.1</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>              <tr>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">600115</td>                <td height=\"30\" align=\"center\" bgcolor=\"#FFFFFF\">东方航空</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">8.1</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">70%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">60%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">50%</td>                <td align=\"center\" bgcolor=\"#FFFFFF\">40%</td>              </tr>            </tbody></table></td>          </tr>        </tbody></table>					',0,0,0,0,0,0),(36,64,'历史类似走势','','','历史类似走势',1432037793,'历史类似走势','',0,0,1,1,0,0),(37,64,'精彩阅读','','','精彩阅读',1432037892,'精彩阅读','',0,0,0,1,0,0),(38,64,'专  题','','','专  题',1432037968,'专  题','',0,0,0,1,0,0),(39,64,'每日要闻','','','每日要闻',1432037981,'每日要闻','',0,0,0,1,0,0),(40,64,'研报推荐','','','研报推荐',1432037996,'研报推荐','',0,0,0,1,0,0),(41,71,'市场传闻','','','市场传闻',1432038016,'市场传闻','',0,0,0,1,0,0),(42,71,'天下私募','','','天下私募',1432038037,'天下私募','',0,0,0,1,0,0),(43,71,'新股申购','','','新股申购',1432038050,'新股申购','',0,0,0,1,0,0),(44,71,'机会情报','','','机会情报',1432038063,'机会情报','',0,0,0,1,0,0),(45,65,'新浪财经','','','新浪财经',1432038106,'新浪财经','',0,0,0,1,0,0),(46,65,'东财财经导读','','','东财财经导读',1432038117,'东财财经导读','',0,0,0,1,0,0),(47,65,'和讯股票','','','和讯股票',1432038129,'和讯股票','',0,0,0,1,0,0),(48,65,'全景互动','','','全景互动',1432038140,'全景互动','',0,0,0,1,0,0),(49,62,'投资评级','','','投资评级',1432038162,'投资评级','',0,0,0,1,0,0),(50,62,'盈利预测','','','盈利预测',1432038189,'盈利预测','',0,0,0,1,0,0),(51,62,'资金流向','','','资金流向',1432038201,'资金流向','',0,0,0,1,0,0),(52,62,'龙 虎 榜','','','龙 虎 榜',1432038214,'龙 虎 榜','',0,0,0,1,0,0),(53,62,'公司公告','','','公司公告',1432038227,'公司公告','',0,0,0,1,0,0),(54,62,'股　　吧','','','股　　吧',1432038240,'股　　吧','',0,0,0,1,0,0),(55,63,'和讯研报','','','和讯研报',1432038257,'和讯研报','',0,0,0,1,0,0),(56,63,'麦博汇金','','','麦博汇金',1432038271,'麦博汇金','',0,0,0,1,0,0),(57,63,'东财研报','','','东财研报',1432038282,'东财研报','',0,0,0,1,0,0),(58,63,'24小时股评','','','24小时股评',1432038295,'24小时股评','',0,0,0,1,0,0),(59,72,'财报选股','','','财报选股',1432038308,'财报选股','',0,0,0,1,0,0),(60,72,'研报选股','','','研报选股',1432038320,'研报选股','',0,0,0,1,0,0),(61,72,'东财选股','','','东财选股',1432038332,'东财选股','',0,0,0,1,0,0),(62,72,'雪球选股','','','雪球选股',1432038344,'雪球选股','',0,0,0,1,0,0),(69,74,'成长型','本站','admin','成长型',1432483028,'成长型','成长型					',0,0,0,0,0,0),(70,74,'价值型','本站','admin','价值型',1432483045,'价值型','价值型					',0,0,0,0,0,0),(71,75,'银河证券：货币政策坚持现有基调','本站','admin','银河证券：货币政策坚持现有基调',1432483536,'银河证券：货币政策坚持现有基调','',0,0,0,0,0,0),(72,76,'银河证券：货币政策坚持现有基调','本站','admin','银河证券：货币政策坚持现有基调',1432483916,'银河证券：货币政策坚持现有基调','<a href=\"http://localhost/EasyCMS/index.php?s=/index/article/index/articleid/63.html#\" style=\"outline-style: none; color: rgb(51, 51, 51); text-decoration: none; font-family: 微软雅黑; line-height: 26px;\">银河证券：货币政策坚持现有基调</a>					',0,0,0,0,0,0);

/*Table structure for table `easy_category` */

DROP TABLE IF EXISTS `easy_category`;

CREATE TABLE `easy_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` int(6) NOT NULL DEFAULT '100',
  `modelid` tinyint(1) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '1',
  `isverify` tinyint(1) NOT NULL DEFAULT '1',
  `ispush` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

/*Data for the table `easy_category` */

insert  into `easy_category`(`id`,`name`,`pid`,`sort`,`modelid`,`isshow`,`isverify`,`ispush`) values (62,'数据大全',0,4,0,1,1,1),(63,'研报评论',0,5,0,1,1,1),(64,'小站特色',0,1,0,1,1,1),(65,'财经要闻',0,3,0,1,1,1),(66,'投资机会',0,100,1,0,0,0),(71,'投资机会',0,2,0,1,1,1),(72,'选股器',0,6,0,1,1,1),(73,'K线选股',0,10,0,0,1,0),(74,'财报选股',0,11,0,0,1,0),(75,'研报推荐',0,12,0,0,1,0),(76,'专题',0,13,0,0,1,0);

/*Table structure for table `easy_comment` */

DROP TABLE IF EXISTS `easy_comment`;

CREATE TABLE `easy_comment` (
  `commend_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `islock` tinyint(1) unsigned NOT NULL,
  `pubtime` int(11) NOT NULL,
  PRIMARY KEY (`commend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `easy_comment` */

insert  into `easy_comment`(`commend_id`,`uid`,`aid`,`content`,`islock`,`pubtime`) values (1,1,12,'很受用，学习了哦',0,1395025593),(2,1,12,'以后一定要避免呀',0,1395025898),(3,1,12,'测试一下态度方法',0,1395025947),(4,1,12,'继续进行态度测试',0,1395025991),(5,1,12,'继续测试吧',0,1395026059),(6,1,12,'测试加1',0,1395026108),(7,1,12,'支持一下',0,1395026145),(8,1,12,'不喜欢，反对',0,1395026174),(9,1,12,'我喜欢这个',0,1395026221),(10,1,12,'特别喜欢这篇文章',0,1395026258),(11,1,29,'第一次看到辽阔的大海 内心是非常的欢乐高兴',0,1395026308),(12,1,29,'爱大海',0,1395026315),(13,1,29,'特别喜欢大海',0,1395026913),(14,1,29,'大海的感觉就是干净',0,1395026949),(15,1,31,'特别喜欢',0,1395034556),(16,4,17,'我是asdf发表的评论',1,1395057066),(17,12,16,'我喜欢你',0,1395057095),(18,4,17,'我是asdf发表的评论',0,1395057107),(19,12,16,'你好啊 啊啊',0,1395057125),(20,13,29,'这是一个号好文章',0,1395057128),(21,14,29,'easycms正式上线',0,1395057217),(22,12,17,'好开心啊',0,1395057222),(23,12,11,'好开心啊啊啊啊啊',0,1395057236),(24,15,11,'真他妈的长',0,1395057304),(30,20,31,'方巾阔服',0,1395060071),(31,1,35,'我操你没',0,1395062109);

/*Table structure for table `easy_fields` */

DROP TABLE IF EXISTS `easy_fields`;

CREATE TABLE `easy_fields` (
  `fields_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `issystem` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fields_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `easy_fields` */

insert  into `easy_fields`(`fields_id`,`field`,`content`,`issystem`) values (1,'license','会员注册协议',1),(2,'copyright','© 恨股网  版权所有 ',1),(3,'des','本站所载文章及数据仅供分享，不可作为投资依据，股市有风险，入市需谨慎。',0);

/*Table structure for table `easy_link` */

DROP TABLE IF EXISTS `easy_link`;

CREATE TABLE `easy_link` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `isverify` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `easy_link` */

insert  into `easy_link`(`link_id`,`name`,`url`,`isverify`) values (2,'东方财富网','http://www.eastmoney.com/',1),(3,'和讯网','http://www.hexun.com',1),(4,'新浪财经','http://finance.sina.com.cn/',1),(5,'雪球网','http://xueqiu.com/',1),(6,'深交所','http://www.szse.cn/',1),(7,'上交所','http://www.sse.com.cn/',1),(8,'证监会','http://www.csrc.gov.cn/pub/newsite/',1),(9,'巨潮资讯网','http://www.cninfo.com.cn/',1),(10,'证券时报网','http://www.stcn.com/',1),(11,'证券日报','http://www.stcn.com/',1),(12,'搜狐财经','http://business.sohu.com/',1),(13,'网易财经','http://money.163.com/',1);

/*Table structure for table `easy_member_user` */

DROP TABLE IF EXISTS `easy_member_user`;

CREATE TABLE `easy_member_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `photo` char(100) NOT NULL,
  `regtime` int(10) unsigned NOT NULL DEFAULT '0',
  `regip` char(15) NOT NULL,
  `islock` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `easy_member_user` */

insert  into `easy_member_user`(`user_id`,`username`,`password`,`email`,`sex`,`photo`,`regtime`,`regip`,`islock`) values (33,'yrsy126','f3b884bcc6afeb0b3a881e33947dc2e2','123871628@qq.com',0,'',1432450496,'0.0.0.0',0),(32,'test162','630022c64000a9d6f8b8342fa9559eed','12873y8@qq.com',0,'',1432449884,'0.0.0.0',0),(25,'a123456','edeb1e9ed54c7692c9c4ba413848efc9','sadasa@qq.com',1,'1395476310_7538268.jpg',1395476257,'27.14.188.67',0),(26,'mike33','88e665b0518ec8418af4d49a2dad9694','10579272@qq.com',1,'',1395495311,'122.241.143.64',0),(27,'liphidge','41506481820b3265f5053e8c9dd614c1','long8782@126.com',1,'',1395497554,'119.181.154.249',0),(28,'eric','e10adc3949ba59abbe56e057f20f883e','2448290642@qq.com',1,'',1395501532,'110.210.30.106',0),(30,'energy162','630022c64000a9d6f8b8342fa9559eed','energy162@sina.com',0,'1432486727_1383626.jpg',1432249796,'0.0.0.0',0),(31,'test123','4297f44b13955235245b2497399d7a93','energy162@sina.com',0,'',1432249835,'0.0.0.0',0);

/*Table structure for table `easy_node` */

DROP TABLE IF EXISTS `easy_node`;

CREATE TABLE `easy_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

/*Data for the table `easy_node` */

insert  into `easy_node`(`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`) values (1,'Admin','后台应用',1,'后台应用',0,0,1),(2,'Rbacuser','RBAC用户管理',1,'RBAC用户管理',0,1,2),(3,'Rbacrole','RBAC角色管理',1,'RBAC角色管理',0,1,2),(4,'Rbacnode','RBAC节点管理',1,'RBAC节点管理',0,1,2),(5,'Rbacaccess','RBAC权限分配',1,'RBAC权限分配',0,1,2),(62,'Database','数据库管理',1,'数据库管理',0,1,2),(7,'Link','友情连接管理',1,'友情连接管理',0,1,2),(8,'Plugin','插件管理',1,'插件管理',0,1,2),(9,'Comment','文章评论管理',1,'文章评论管理',0,1,2),(10,'Articlem','文章内容管理',1,'文章内容管理',0,1,2),(11,'Category','文章分类管理',1,'文章分类管理',0,1,2),(12,'add','添加用户',1,'添加用户',0,2,3),(13,'edit','修改用户',1,'修改用户',0,2,3),(14,'delete','删除用户',1,'删除用户',0,2,3),(15,'index','浏览系统用户',1,'浏览系统用户',0,2,3),(16,'edit','修改角色',1,'修改角色',0,3,3),(17,'delete','删除角色',1,'删除角色',0,3,3),(18,'add','添加角色',1,'添加角色',0,3,3),(19,'index','浏览角色',1,'浏览角色',0,3,3),(20,'editpwd','修改密码',1,'修改密码',0,4,3),(21,'edit','修改用户',1,'修改用户',0,4,3),(22,'delete','删除用户',1,'删除用户',0,4,3),(23,'add','添加用户',1,'添加用户',0,4,3),(24,'index','浏览节点',1,'浏览节点',0,4,3),(25,'edit','权限浏览',1,'权限浏览',0,5,3),(56,'User','会员管理',1,'会员管理',0,1,2),(63,'index','数据还原',1,'数据还原',0,62,3),(29,'add','添加连接',1,'添加连接',0,7,3),(30,'edit','修改连接',1,'修改连接',0,7,3),(31,'delete','删除连接',1,'删除连接',0,7,3),(32,'index','浏览友情连接',1,'浏览友情连接',0,7,3),(33,'changeInstall','安装卸载',1,'安装卸载',0,8,3),(34,'edit','插件配置',1,'插件配置',0,8,3),(35,'index','插件浏览',1,'插件浏览',0,8,3),(36,'changeState','回收评论',1,'回收评论',0,9,3),(37,'rubAll','批量回收',1,'批量回收',0,9,3),(38,'delAll','批量删除',1,'批量删除',0,9,3),(39,'index','浏览评论',1,'浏览评论',0,9,3),(40,'add','添加文章',1,'添加文章',0,10,3),(41,'edit','修改文章',1,'修改文章',0,10,3),(42,'changeState','回收文章',1,'回收文章',0,10,3),(43,'rubAll','批量回收',1,'批量回收',0,10,3),(44,'recAll','批量恢复',1,'批量恢复',0,10,3),(45,'delAll','永久删除',1,'永久删除',0,10,3),(46,'index','浏览文章',1,'浏览文章',0,10,3),(47,'index','浏览分类',1,'浏览分类',0,11,3),(48,'add','添加分类',1,'添加分类',0,11,3),(49,'edit','修改分类',1,'修改分类',0,11,3),(50,'delete','删除分类',1,'删除分类',0,11,3),(51,'changeState','状态操作',1,'状态操作',0,11,3),(52,'Index','前端应用',1,'前端应用',0,0,1),(53,'rubbish','文章回收站',1,'文章回收站',0,10,3),(54,'rubbish','评论回收站',1,'评论回收站',0,9,3),(55,'recAll','批量恢复',1,'批量恢复',0,9,3),(57,'index','浏览会员',1,'浏览会员',0,56,3),(58,'add','添加会员',1,'添加会员',0,56,3),(59,'delete','删除会员',1,'删除会员',0,56,3),(60,'delAll','批量删除',1,'批量删除',0,56,3),(61,'editpwd','修改密码',1,'修改密码',0,56,3);

/*Table structure for table `easy_plugin` */

DROP TABLE IF EXISTS `easy_plugin`;

CREATE TABLE `easy_plugin` (
  `plugin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `desc` varchar(255) NOT NULL DEFAULT '无',
  `method` varchar(255) NOT NULL,
  `isinstalled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `position` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`plugin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `easy_plugin` */

insert  into `easy_plugin`(`plugin_id`,`name`,`desc`,`method`,`isinstalled`,`position`) values (7,'Baidushare','百度分享','Index/Baidushare/info',1,1);

/*Table structure for table `easy_role` */

DROP TABLE IF EXISTS `easy_role`;

CREATE TABLE `easy_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `easy_role` */

insert  into `easy_role`(`id`,`name`,`pid`,`status`,`remark`) values (7,'测试帐号',0,1,'测试帐号');

/*Table structure for table `easy_role_user` */

DROP TABLE IF EXISTS `easy_role_user`;

CREATE TABLE `easy_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `easy_role_user` */

insert  into `easy_role_user`(`role_id`,`user_id`) values (3,'7'),(4,'8'),(3,'9'),(5,'10'),(5,'11'),(6,'12'),(7,'13');

/*Table structure for table `easy_user` */

DROP TABLE IF EXISTS `easy_user`;

CREATE TABLE `easy_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL,
  `loginip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `easy_user` */

insert  into `easy_user`(`id`,`username`,`password`,`logintime`,`loginip`,`lock`) values (6,'admin','21232f297a57a5a743894a0e4a801fc3',1431759735,'0.0.0.0',0),(13,'demo','fe01ce2a7fbac8fafaed7c982a04e229',1396106659,'127.0.0.1',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
