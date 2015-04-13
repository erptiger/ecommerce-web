
CREATE TABLE `t_drp_material_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '分类名称',
  `parent_id` bigint(20) DEFAULT NULL COMMENT '父类编号',
  `code` varchar(30) NOT NULL COMMENT '类型编码',
  `status` bigint(20) DEFAULT NULL COMMENT '是否有效?1:有效:0,无效',
  `organization_id` bigint(20) DEFAULT NULL COMMENT '组织机构编号',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Idx_item_type_code` (`code`),
  KEY `FK_T_ITEM_T_REFERENCE_T_ITEM_T` (`parent_id`),
  CONSTRAINT `FK_T_ITEM_T_REFERENCE_T_ITEM_T` FOREIGN KEY (`parent_id`) REFERENCES `t_drp_material_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='商品分类';


CREATE TABLE `t_drp_material` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `material_code` varchar(50) DEFAULT NULL COMMENT '商品编码',
  `material_barcode` varchar(50) DEFAULT NULL COMMENT '商品主条码',
  `material_name` varchar(100) DEFAULT NULL COMMENT '商品名称',
  `material_short_name` varchar(100) DEFAULT NULL COMMENT '商品简称',
  `material_pinyin` varchar(100) DEFAULT NULL COMMENT '助记码',
  `material_spec` varchar(100) DEFAULT NULL COMMENT '规格',
  `material_model` varchar(100) DEFAULT NULL COMMENT '型号',
  `product_area` varchar(200) DEFAULT NULL COMMENT '产地',
  `material_unit` bigint(20) DEFAULT NULL COMMENT '基本单位',
  `material_type_id` bigint(20) NOT NULL COMMENT '商品分类',
  `sale_price` decimal(20,6) DEFAULT NULL COMMENT '销售价',
  `in_price` decimal(20,6) DEFAULT NULL COMMENT '进货价',
  `retail_price` decimal(20,6) DEFAULT NULL COMMENT '零售价',
  `vip_price` decimal(20,6) DEFAULT NULL COMMENT '会员价',
  `in_tax_rate` decimal(20,6) DEFAULT NULL COMMENT '进价税率',
  `sale_tax_rate` decimal(20,6) DEFAULT NULL COMMENT '销价税率',
  `description` varchar(400) DEFAULT NULL COMMENT '描述',
  `cost_compute_type` bigint(20) DEFAULT NULL COMMENT '成本计算方式：加权平均法,   移动加权平均法,   先进先出法,   分批认定法',
  `photo` bigint(20) DEFAULT NULL COMMENT '图片ID',
  `mat_brand_type_id` bigint(20) DEFAULT NULL COMMENT '品牌类型（备用）',
  `master_sup_id` bigint(20) DEFAULT NULL COMMENT '主供应商',
  `add_time` datetime DEFAULT NULL COMMENT '上架时间',
  `package_list` varchar(100) DEFAULT NULL COMMENT '包装清单',
  `shop_id` bigint(20) DEFAULT NULL COMMENT '网店编号',
  `status` bigint(20) NOT NULL COMMENT '状态?1,有效:0,无效',
  `batch_flag` bigint(20) DEFAULT NULL COMMENT '是否批次管理?1,是:0,否',
  `batch_number_auto` bigint(20) DEFAULT NULL COMMENT '是否自动生成批号?1,是:0,否；一般规则为yyyyMMdd##',
  `guarantee_flag` bigint(20) DEFAULT NULL COMMENT '是否保质期管理?1,是:0,否',
  `guarantee_days` int(11) DEFAULT NULL COMMENT '保质期(天)',
  `combine_split` bigint(20) DEFAULT NULL COMMENT '是否可拆分组合?1,是:0,否',
  `create_user_id` bigint(20) DEFAULT NULL COMMENT '记录创建人',
  `create_date` datetime DEFAULT NULL COMMENT '记录创建时间',
  `update_user_id` bigint(20) DEFAULT NULL COMMENT '记录最后一次更新人',
  `update_date` datetime DEFAULT NULL COMMENT '记录最后一次更新时间',
  `organization_id` bigint(20) DEFAULT NULL COMMENT '组织机构编号',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_item_info_item_code` (`material_code`),
  CONSTRAINT `FK_T_ITEM_I_REFERENCE_T_ITEM_T` FOREIGN KEY (`material_type_id`) REFERENCES `t_drp_material_type` (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品资料';

select * from t_drp_material_type;
select * from t_drp_material;