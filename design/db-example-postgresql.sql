-- Adminer 4.7.1 PostgreSQL dump

\connect "control-apps-ui";

DROP TABLE IF EXISTS "applications";
DROP SEQUENCE IF EXISTS applications_id_seq;
CREATE SEQUENCE applications_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."applications" (
    "id" integer DEFAULT nextval('applications_id_seq') NOT NULL,
    "title" character varying,
    "comment" character varying,
    "created" date,
    "updated" date,
    CONSTRAINT "applications_pkc" PRIMARY KEY ("id")
) WITH (oids = false);

COMMENT ON TABLE "public"."applications" IS 'アプリケーション';

COMMENT ON COLUMN "public"."applications"."id" IS 'id';

COMMENT ON COLUMN "public"."applications"."title" IS 'タイトル';

COMMENT ON COLUMN "public"."applications"."comment" IS 'コメント';

COMMENT ON COLUMN "public"."applications"."created" IS '作成日時';

COMMENT ON COLUMN "public"."applications"."updated" IS '更新日時';

INSERT INTO "applications" ("id", "title", "comment", "created", "updated") VALUES
(1,	'user-application-1',	'ユーザーアプリケーション1',	'2019-05-27',	NULL),
(2,	'user-application-2',	'ユーザーアプリケーション2',	'2019-05-27',	NULL),
('0',	'all',	'全てのアプリケーション',	NULL,	NULL);

DROP TABLE IF EXISTS "config_templates";
DROP SEQUENCE IF EXISTS config_templates_id_seq;
CREATE SEQUENCE config_templates_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."config_templates" (
    "id" integer DEFAULT nextval('config_templates_id_seq') NOT NULL,
    "title" character varying,
    "text" character varying,
    "comment" character varying,
    "created" date,
    "updated" date,
    CONSTRAINT "config_templates_pkc" PRIMARY KEY ("id")
) WITH (oids = false);

COMMENT ON TABLE "public"."config_templates" IS '設定テンプレート';

COMMENT ON COLUMN "public"."config_templates"."id" IS 'id';

COMMENT ON COLUMN "public"."config_templates"."title" IS 'タイトル';

COMMENT ON COLUMN "public"."config_templates"."text" IS 'テキスト';

COMMENT ON COLUMN "public"."config_templates"."comment" IS 'コメント';

COMMENT ON COLUMN "public"."config_templates"."created" IS '作成日時';

COMMENT ON COLUMN "public"."config_templates"."updated" IS '更新日時';

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

DROP TABLE IF EXISTS "parameter_types";
DROP SEQUENCE IF EXISTS parameter_types_id_seq;
CREATE SEQUENCE parameter_types_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."parameter_types" (
    "id" integer DEFAULT nextval('parameter_types_id_seq') NOT NULL,
    "title" character varying,
    "regex" character varying,
    "comment" character varying,
    "created" date,
    "updated" date,
    CONSTRAINT "parameter_types_pkc" PRIMARY KEY ("id")
) WITH (oids = false);

COMMENT ON TABLE "public"."parameter_types" IS '属性タイプ';

COMMENT ON COLUMN "public"."parameter_types"."id" IS 'id';

COMMENT ON COLUMN "public"."parameter_types"."title" IS 'タイトル';

COMMENT ON COLUMN "public"."parameter_types"."regex" IS '正規表現';

COMMENT ON COLUMN "public"."parameter_types"."comment" IS 'コメント';

COMMENT ON COLUMN "public"."parameter_types"."created" IS '作成日時';

COMMENT ON COLUMN "public"."parameter_types"."updated" IS '更新日時';

INSERT INTO "parameter_types" ("id", "title", "regex", "comment", "created", "updated") VALUES
(1,	'IPv4',	'[\d]+\.[\d]+\.[\d]+\.[\d]+',	'IPv4',	'2019-05-27',	NULL),
(2,	'ProxyPreserveHost',	'(On|Off)',	'',	'2019-05-27',	NULL),
(3,	'ConfigTemplateId',	'[\d]+',	'設定テンプレートID',	'2019-05-27',	NULL);

DROP TABLE IF EXISTS "server_parameters";
DROP SEQUENCE IF EXISTS server_parameters_id_seq;
CREATE SEQUENCE server_parameters_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."server_parameters" (
    "id" integer DEFAULT nextval('server_parameters_id_seq') NOT NULL,
    "server_id" integer NOT NULL,
    "application_id" integer NOT NULL,
    "parameter_type_id" integer NOT NULL,
    "value" character varying,
    "comment" character varying,
    "created" date,
    "updated" date,
    CONSTRAINT "server_parameters_pkc" PRIMARY KEY ("id"),
    CONSTRAINT "server_parameters_fk1" FOREIGN KEY (application_id) REFERENCES applications(id) NOT DEFERRABLE,
    CONSTRAINT "server_parameters_fk2" FOREIGN KEY (parameter_type_id) REFERENCES parameter_types(id) NOT DEFERRABLE,
    CONSTRAINT "server_parameters_fk3" FOREIGN KEY (server_id) REFERENCES servers(id) NOT DEFERRABLE
) WITH (oids = false);

COMMENT ON TABLE "public"."server_parameters" IS '対象サーバー属性値';

COMMENT ON COLUMN "public"."server_parameters"."id" IS 'id';

COMMENT ON COLUMN "public"."server_parameters"."server_id" IS '対象サーバーID';

COMMENT ON COLUMN "public"."server_parameters"."application_id" IS 'アプリケーションID';

COMMENT ON COLUMN "public"."server_parameters"."parameter_type_id" IS '属性タイプID';

COMMENT ON COLUMN "public"."server_parameters"."value" IS '値';

COMMENT ON COLUMN "public"."server_parameters"."comment" IS 'コメント';

COMMENT ON COLUMN "public"."server_parameters"."created" IS '作成日時';

COMMENT ON COLUMN "public"."server_parameters"."updated" IS '更新日時';

INSERT INTO "server_parameters" ("id", "server_id", "application_id", "parameter_type_id", "value", "comment", "created", "updated") VALUES
(3,	'0',	1,	3,	'1',	'ユーザーアプリケーション1 -> VirtualHost型',	'2019-05-27',	NULL),
(1,	1,	'0',	1,	'192.168.0.101',	'アプリケーションサーバー1号機 IPアドレス',	'2019-05-27',	NULL),
(2,	'0',	'0',	2,	'On',	'',	'2019-05-27',	NULL),
(4,	2,	'0',	1,	'192.168.0.102',	'アプリケーションサーバー2号機 IPアドレス	',	'2019-05-27',	NULL);

DROP TABLE IF EXISTS "servers";
DROP SEQUENCE IF EXISTS servers_id_seq;
CREATE SEQUENCE servers_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."servers" (
    "id" integer DEFAULT nextval('servers_id_seq') NOT NULL,
    "title" character varying,
    "comment" character varying,
    "created" date,
    "updated" date,
    CONSTRAINT "servers_pkc" PRIMARY KEY ("id")
) WITH (oids = false);

COMMENT ON TABLE "public"."servers" IS '対象サーバー';

COMMENT ON COLUMN "public"."servers"."id" IS 'id';

COMMENT ON COLUMN "public"."servers"."title" IS 'タイトル';

COMMENT ON COLUMN "public"."servers"."comment" IS 'コメント';

COMMENT ON COLUMN "public"."servers"."created" IS '作成日時';

COMMENT ON COLUMN "public"."servers"."updated" IS '更新日時';

INSERT INTO "servers" ("id", "title", "comment", "created", "updated") VALUES
(1,	'app-server-1',	'アプリケーションサーバー1号機',	'2019-05-27',	NULL),
(2,	'app-server-2',	'アプリケーションサーバー2号機',	'2019-05-27',	NULL),
('0',	'all',	'全てのサーバー',	NULL,	NULL);

-- 2019-05-29 06:49:23.565918+00
