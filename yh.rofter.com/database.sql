

CREATE TABLE IF NOT EXISTS `hd_user` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `type` int(11) NOT NULL COMMENT '用户类型，1研究生，2考生',
  `user` varchar(255) NOT NULL COMMENT '用户名',
  `phone` varchar(255) NOT NULL COMMENT '联系电话',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `uname` varchar(40) DEFAULT NULL COMMENT '姓名',
  `gender` int(11) DEFAULT NULL COMMENT '性别,1男,2女',
  `wechat` varchar(255) DEFAULT NULL COMMENT '微信号',
  `qq` varchar(255) DEFAULT NULL COMMENT 'QQ号',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `school` varchar(255) DEFAULT NULL  COMMENT '就读学校',
  `profession` varchar(255) DEFAULT NULL  COMMENT '就读专业',
  `targetschool` varchar(255) DEFAULT NULL  COMMENT '目标学校',
  `targetprofession` varchar(255) DEFAULT NULL  COMMENT '目标专业',
  `subject` varchar(255) DEFAULT NULL  COMMENT '擅长专业',
  `year` int(11) DEFAULT NULL  COMMENT '入学年份',
  `image` varchar(255) DEFAULT NULL  COMMENT '用户头像',
  `status` int(11) DEFAULT 0  COMMENT '用户状态,0已注册但未填写详情,1注册完成,9删除状态',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3000 ;


CREATE TABLE IF NOT EXISTS `hd_partner` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(255) NOT NULL COMMENT '学院名称',
  `url` varchar(255) NOT NULL COMMENT '学院官网链接',
  `image` varchar(255) NOT NULL COMMENT '学院logo存储地址',
  `sort` int(11) NOT NULL DEFAULT 1 COMMENT '排序,越大越靠前',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;



CREATE TABLE IF NOT EXISTS `hd_teacher` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(255) NOT NULL COMMENT '教师名称',
  `profession` varchar(255) NOT NULL COMMENT '教师专业',
  `score` int(11) NOT NULL COMMENT '考研分数',
  `image` varchar(255) NOT NULL COMMENT '照片地址',
  `sort` int(11) NOT NULL DEFAULT 1 COMMENT '教师排序,越大越靠前',
  `description` text DEFAULT NULL  COMMENT '教师信息描述',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;



CREATE TABLE IF NOT EXISTS `hd_course` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `school` varchar(255) NOT NULL COMMENT '学校名称',
  `profession` varchar(255) NOT NULL COMMENT '学校专业',
  `thumb` varchar(255) NOT NULL COMMENT '课程封面图',
  `name` varchar(255) NOT NULL COMMENT '课程名称',
  `type` varchar(255) NOT NULL COMMENT '学院类型',
  `image` varchar(255) NOT NULL COMMENT '课程图片',
  `description` text DEFAULT NULL COMMENT '课程详情描述',
  `match` varchar(255) NOT NULL COMMENT '使用人群',
  `sort` int(11)  NOT NULL COMMENT '排序',
  `price` int(11)  NOT NULL COMMENT '课程价格',
  `studied` int(11)  NOT NULL COMMENT '在学人数',
  `sign` int(11)  NOT NULL COMMENT '报名人数',
  `praise` varchar(255) NOT NULL COMMENT '好评',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `hd_course_detail` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `courseid` int NOT NULL COMMENT '对应课程表ID',
  `detail_title` varchar(255) NOT NULL COMMENT '课程视频名称',
  `detail_url` varchar(255) NOT NULL COMMENT '课程视频地址',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


CREATE TABLE IF NOT EXISTS `hd_banner` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `title` varchar(255) NOT NULL COMMENT '轮播图片标题',
  `key` varchar(255) NOT NULL COMMENT '图片对应模块',
  `url` varchar(255) DEFAULT NULL COMMENT '图片对应地址',
  `image` varchar(255) NOT NULL COMMENT '图片存储路径',
  `sort` int(11) NOT NULL COMMENT '排序',
  `description` text NOT NULL COMMENT '图片描述',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

subject id teacherid studentid status name created_at updated_at
subject_detail id subject_id status date content  created_at updated_at

CREATE TABLE IF NOT EXISTS `hd_subject` (
`id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID', 
`teacherid` int NOT NULL COMMENT '教师id',
`studentid` int NOT NULL COMMENT '学生id',
`status`  tinyint(2) DEFAULT NULL COMMENT '课程添加状态,0学生申请,1教师同意',
`name` varchar(255) NOT NULL COMMENT '课程名称',
`created_at` datetime COMMENT '创建时间',
`updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `hd_subject_detail` (
`id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
`subject_id` int NOT NULL COMMENT '课程id',
`status` tinyint(2) DEFAULT NULL COMMENT '课程详情添加状态,0教师添加,1教师确认,2学生确认',
`date` varchar(255) NOT NULL  COMMENT '上课时间',
`content` text DEFAULT NULL COMMENT '上课内容',
`created_at` datetime COMMENT '创建时间',
`updated_at` datetime COMMENT '修改时间',
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `hd_admin_user` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `phone` varchar(255) NOT NULL COMMENT '手机号(账号)',
  `uname` varchar(255) NOT NULL COMMENT '用户名',
  `pwd` char(32) DEFAULT NULL COMMENT '密码',
  `original_pwd` char(32) DEFAULT NULL COMMENT '原密码',
  `type` tinyint(2) DEFAULT NULL COMMENT '用户权限,1超级管理员,2二级管理员',
  `status` tinyint(2) DEFAULT NULL COMMENT '用户状态 1正常0禁用',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `hd_teacher_group` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `adminid` mediumint(11) NOT NULL COMMENT '二级管理员id',
  `teacherid` varchar(255) NOT NULL COMMENT '教师id',
  `created_at` datetime COMMENT '创建时间',
  `updated_at` datetime COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT '教师分配表';