INSERT INTO "applications" ("id", "title", "comment", "created", "updated") VALUES
(1,	'user-application-1',	'ユーザーアプリケーション1',	'2019-05-27',	NULL),
(2,	'user-application-2',	'ユーザーアプリケーション2',	'2019-05-27',	NULL),
('0',	'all',	'全てのアプリケーション',	NULL,	NULL);

INSERT INTO "config_templates" ("id", "title", "text", "comment", "created", "updated") VALUES
(1,	'VirtualHost',	'<VirtualHost *:${Port}>
  ProxyPreserveHost ${ProxyPreserveHost}
  ServerName ${ServerName}
  ProxyPass ${ProxyPassFrom} ${ProxyPassTo}
  ProxyPassReverse ${ProxyPassReverseFrom} ${ProxyPassReverseTo}
  ErrorLog ${APACHE_LOG_DIR}/${ServerName}.log
</VirtualHost>
',	'バーチャルホスト型',	'2019-05-27',	NULL),
(2,	'Location',	'<Location "/proxy">
    ProxyPass ${ProxyPassFrom}
    ProxyPassReverse ${ProxyPassReverseFrom}
    ProxyPassReverseCookieDomain ${ProxyPassReverseCookieDomain}
    ProxyPassReverseCookiePath / ${ProxyPassReverseCookiePath}
</Location>
',	'Locationディレクティブ型',	'2019-05-27',	NULL);

INSERT INTO "parameter_types" ("id", "title", "regex", "comment", "created", "updated") VALUES
(1,	'IPv4',	'[\d]+\.[\d]+\.[\d]+\.[\d]+',	'IPv4',	'2019-05-27',	NULL),
(2,	'ProxyPreserveHost',	'(On|Off)',	'',	'2019-05-27',	NULL),
(3,	'ConfigTemplateId',	'[\d]+',	'設定テンプレートID',	'2019-05-27',	NULL);

INSERT INTO "server_parameters" ("id", "server_id", "application_id", "parameter_type_id", "value", "comment", "created", "updated") VALUES
(3,	'0',	1,	3,	'1',	'ユーザーアプリケーション1 -> VirtualHost型',	'2019-05-27',	NULL),
(1,	1,	'0',	1,	'192.168.0.101',	'アプリケーションサーバー1号機 IPアドレス',	'2019-05-27',	NULL),
(2,	'0',	'0',	2,	'On',	'',	'2019-05-27',	NULL),
(4,	2,	'0',	1,	'192.168.0.102',	'アプリケーションサーバー2号機 IPアドレス	',	'2019-05-27',	NULL);

INSERT INTO "servers" ("id", "title", "comment", "created", "updated") VALUES
(1,	'app-server-1',	'アプリケーションサーバー1号機',	'2019-05-27',	NULL),
(2,	'app-server-2',	'アプリケーションサーバー2号機',	'2019-05-27',	NULL),
('0',	'all',	'全てのサーバー',	NULL,	NULL);
