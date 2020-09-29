USE [syslogin]
GO
/****** Object:  Table [dbo].[Tsistema]    Script Date: 11/18/2016 14:10:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Tsistema](
	[id_sistema] [int] IDENTITY(1,1) NOT NULL,
	[Nombre_sys] [varchar](100) NULL,
	[ruta_sistema] [varchar](150) NULL,
	[estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_sistema] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Tsistema] ON
INSERT [dbo].[Tsistema] ([id_sistema], [Nombre_sys], [ruta_sistema], [estado]) VALUES (1, N'Seguridad-SISI', N'../Seguridad', 1)
SET IDENTITY_INSERT [dbo].[Tsistema] OFF
/****** Object:  Table [dbo].[dependencia]    Script Date: 11/18/2016 14:10:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[dependencia](
	[id_dependencia] [int] IDENTITY(1,1) NOT NULL,
	[nombre_dependencia] [varchar](500) NOT NULL,
	[activo] [bigint] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_dependencia] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[dependencia] ON
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (1, N'DESPACHO SUPERIOR', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (2, N'VICEMINISTERIO ADMINISTRATIVO Y FINANCIERO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (3, N'VICEMINISTERIO DE INVERSION Y COMPETENCIA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (4, N'VICEMINISTERIO DE INTEGRACION  Y COMERCIO EXTERIOR', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (5, N'VICEMINISTERIO DE DESARROLLO  DE MYPIMES', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (6, N'ASESORIA JURIDICA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (7, N'AUDITORIA INTERNA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (8, N'OFICINA DE COMUNICACION SOCIAL', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (9, N'DIRECCION  DE POLITICA COMERCIAL EXTERNA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (10, N'DIRECCION  DEL COMERCIO EXTERIOR', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (11, N'DIRECCION DE ANALISIS ECONOMICO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (12, N'DIRECCION DE PROGRAMAS  Y PROYECTOS  DE COOPERACION', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (13, N'DIRECCION  DE SERVICIOS AL COMERCIO  Y A LA INVERSION', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (14, N'DIRECCION  DE PROMOCION DE LA COMPETENCIA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (15, N'DIRECCION  DE SERVICIOS FINANCIEROS Y TECNICOS MYPYME', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (16, N'DIRECCION  DE SERVICIO AL DESARROLLO EMPRESARIAL', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (17, N'DIRECCION FINANCIERA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (18, N'DIRECCION DE RECURSOS HUMANOS', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (19, N'DIRECCION DE TECNOLOGIAS DE LA INFORMACION', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (20, N'SECRETARIA GENERAL', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (21, N'MANTENIMIENTO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (22, N'ARCHIVO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (23, N'SISTEMA NACIONAL DE LA CALIDAD', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (24, N'DIACO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (25, N'REGISTRO DEL MERCADO DE VALORES Y MERCANCIAS', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (26, N'RELACIONES PUBLICAS', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (27, N'REGISTRO DE LA PROPIEDAD INTELECTUAL', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (28, N'METROLOGIA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (29, N'CENTRO DE REFERENCIA OMC', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (30, N'SIGEMINECO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (31, N'SITRAME', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (32, N'REGISTRO MERCANTIL', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (33, N'FOGUAMI', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (34, N'COGUANOR', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (35, N'APOYO A MYPES (RELEX)', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (36, N'REGISTRO DE GARANTIAS MOBILIARIAS', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (37, N'PROGRAMA NACIONAL DE COMPETITIVIDAD PRONACOM', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (38, N'REGISTRO DE PRESTADORES DE SERVICIOS DE CERTIFICACION', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (39, N'CAFETERIA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (40, N'CLEAN OMATIC', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (41, N'PROGRAMA DE APOYO AL COMERIO EXTERIOR', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (42, N'MINECO RECEPCION', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (43, N'SEGURIDAD MINECO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (44, N'TRANSPORTES Y PARQUEO', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (45, N'UNIDAD DE GENERO Y MULTICULTURALIDAD', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (46, N'UNIDAD DE INFORMACION PUBLICA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (47, N'DIRECCION DE DESARROLLO INSTITUCIONAL', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (48, N'DIRECCION DE ADQUISICIONES Y CONTRATACIONES', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (49, N'DIRECCION ADMINISTRATIVA', 1)
INSERT [dbo].[dependencia] ([id_dependencia], [nombre_dependencia], [activo]) VALUES (50, N'Dirección de Contrataciones y Adquisiciones', 1)
SET IDENTITY_INSERT [dbo].[dependencia] OFF
/****** Object:  Table [dbo].[tipo_link]    Script Date: 11/18/2016 14:10:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tipo_link](
	[id_tlink] [int] IDENTITY(1,1) NOT NULL,
	[tipo_enlace] [varchar](100) NULL,
	[fecha_crea] [datetime] NOT NULL,
	[id_sistema] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_tlink] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[tipo_link] ON
INSERT [dbo].[tipo_link] ([id_tlink], [tipo_enlace], [fecha_crea], [id_sistema]) VALUES (1, N'Home_system', CAST(0x0000A6C200C81E38 AS DateTime), 1)
INSERT [dbo].[tipo_link] ([id_tlink], [tipo_enlace], [fecha_crea], [id_sistema]) VALUES (2, N'Menu', CAST(0x0000A6C200C97073 AS DateTime), 1)
SET IDENTITY_INSERT [dbo].[tipo_link] OFF
/****** Object:  Table [dbo].[Trol]    Script Date: 11/18/2016 14:10:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Trol](
	[id_rol] [int] IDENTITY(1,1) NOT NULL,
	[Nombre_rol] [varchar](50) NULL,
	[fecha_crea] [datetime] NOT NULL,
	[id_sistema] [int] NULL,
	[estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_rol] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Trol] ON
INSERT [dbo].[Trol] ([id_rol], [Nombre_rol], [fecha_crea], [id_sistema], [estado]) VALUES (1, N'Master', CAST(0x0000A6C200C7EC3C AS DateTime), 1, 1)
SET IDENTITY_INSERT [dbo].[Trol] OFF
/****** Object:  Table [dbo].[Tlinks]    Script Date: 11/18/2016 14:10:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Tlinks](
	[id_link] [int] IDENTITY(1,1) NOT NULL,
	[id_sistema] [int] NULL,
	[nombre_link] [varchar](150) NULL,
	[Nombre_lk] [varchar](60) NULL,
	[icono] [image] NULL,
	[estado] [int] NULL,
	[id_rol] [int] NULL,
	[id_tlink] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_link] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Tlinks] ON
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (1, 1, N'../Seguridad/index.php', N'Inicio del sistema', NULL, 1, 1, 1)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (2, 1, N'../Seguridad/formulario_usu_nuevo.php', N'Nuevo Usuario', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (3, 1, N'../Seguridad/formulario_sys_nuevo.php', N'Nuevo Sistema', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (4, 1, N'../Seguridad/formulario_depto_nuevo.php', N'Nueva Dependencia', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (5, 1, N'../Seguridad/formulario_rol_nuevo.php', N'Nuevo Rol', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (6, 1, N'../Seguridad/formulario_tlnk_nuevo.php', N'Nuevo Permiso/Menu', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (7, 1, N'../Seguridad/formulario_lnk_nuevo.php', N'Nuevo Funcion', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (8, 1, N'../Seguridad/formulario_asig_nuevo.php', N'Asignar Sistema, Rol, Permiso', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (9, 1, N'../Seguridad/formulario_consulta.php', N'Buscar Usuario', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (10, 1, N'../Seguridad/formulario_consulta_sys.php', N'Buscar Sistema', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (11, 1, N'../Seguridad/formulario_consulta_rol.php', N'Buscar Rol', NULL, 1, NULL, 2)
INSERT [dbo].[Tlinks] ([id_link], [id_sistema], [nombre_link], [Nombre_lk], [icono], [estado], [id_rol], [id_tlink]) VALUES (12, 1, N'../Seguridad/formulario_consulta_lnk.php', N'Buscar Funcion', NULL, 1, NULL, 2)
SET IDENTITY_INSERT [dbo].[Tlinks] OFF
/****** Object:  Table [dbo].[Tusuario]    Script Date: 11/18/2016 14:10:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Tusuario](
	[id_usu] [int] IDENTITY(1,1) NOT NULL,
	[nombre1] [varchar](35) NULL,
	[nombre2] [varchar](40) NULL,
	[apellidop] [varchar](40) NULL,
	[apellidom] [varchar](40) NULL,
	[usuario] [varchar](35) NULL,
	[passwordd] [varchar](100) NULL,
	[fecha_crea] [datetime] NOT NULL,
	[estado] [int] NULL,
	[id_dependencia] [int] NULL,
	[id_rol] [int] NULL,
	[email] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_usu] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Tusuario] ON
INSERT [dbo].[Tusuario] ([id_usu], [nombre1], [nombre2], [apellidop], [apellidom], [usuario], [passwordd], [fecha_crea], [estado], [id_dependencia], [id_rol], [email]) VALUES (1, N'Kevin', N'Emilio', N'de Paz', N'Hernandez', N'Kdepaz', N'kevin', CAST(0x0000A6C200C7A61F AS DateTime), 1, 19, NULL, N'kdepaz@mineco.gob.gt')
SET IDENTITY_INSERT [dbo].[Tusuario] OFF
/****** Object:  Table [dbo].[Tasignacion]    Script Date: 11/18/2016 14:10:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tasignacion](
	[id_asignacion] [int] IDENTITY(1,1) NOT NULL,
	[id_usu] [int] NULL,
	[id_sistema] [int] NULL,
	[id_rol] [int] NULL,
	[id_link] [int] NULL,
	[fecha_asig] [datetime] NOT NULL,
	[id_tlink] [int] NULL,
	[estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_asignacion] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Tasignacion] ON
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (1, 1, 1, 1, 1, CAST(0x0000A6C200C8E79A AS DateTime), 1, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (2, 1, 1, 1, 2, CAST(0x0000A6C200C9C72A AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (3, 1, 1, 1, 3, CAST(0x0000A6C200CB1C72 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (4, 1, 1, 1, 4, CAST(0x0000A6C200CB5F33 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (5, 1, 1, 1, 5, CAST(0x0000A6C200CBB617 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (6, 1, 1, 1, 6, CAST(0x0000A6C200CC0060 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (7, 1, 1, 1, 7, CAST(0x0000A6C200CC6307 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (8, 1, 1, 1, 8, CAST(0x0000A6C200CCE2FD AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (9, 1, 1, 1, 9, CAST(0x0000A6C200CDC354 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (10, 1, 1, 1, 10, CAST(0x0000A6C200CE0AE5 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (11, 1, 1, 1, 11, CAST(0x0000A6C200CEA3D1 AS DateTime), 2, 1)
INSERT [dbo].[Tasignacion] ([id_asignacion], [id_usu], [id_sistema], [id_rol], [id_link], [fecha_asig], [id_tlink], [estado]) VALUES (12, 1, 1, 1, 12, CAST(0x0000A6C200CEDD17 AS DateTime), 2, 1)
SET IDENTITY_INSERT [dbo].[Tasignacion] OFF
/****** Object:  Default [DF__Tasignaci__fecha__66603565]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tasignacion] ADD  DEFAULT (getdate()) FOR [fecha_asig]
GO
/****** Object:  Default [DF__tipo_link__fecha__73BA3083]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[tipo_link] ADD  DEFAULT (getdate()) FOR [fecha_crea]
GO
/****** Object:  Default [DF__Trol__fecha_crea__5DCAEF64]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Trol] ADD  DEFAULT (getdate()) FOR [fecha_crea]
GO
/****** Object:  Default [DF__Tusuario__fecha___5535A963]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tusuario] ADD  DEFAULT (getdate()) FOR [fecha_crea]
GO
/****** Object:  ForeignKey [FK_Tasignacion_tipo_link]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tasignacion]  WITH CHECK ADD  CONSTRAINT [FK_Tasignacion_tipo_link] FOREIGN KEY([id_tlink])
REFERENCES [dbo].[tipo_link] ([id_tlink])
GO
ALTER TABLE [dbo].[Tasignacion] CHECK CONSTRAINT [FK_Tasignacion_tipo_link]
GO
/****** Object:  ForeignKey [FK_Tasignacion_Tlinks1]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tasignacion]  WITH CHECK ADD  CONSTRAINT [FK_Tasignacion_Tlinks1] FOREIGN KEY([id_link])
REFERENCES [dbo].[Tlinks] ([id_link])
GO
ALTER TABLE [dbo].[Tasignacion] CHECK CONSTRAINT [FK_Tasignacion_Tlinks1]
GO
/****** Object:  ForeignKey [FK_Tasignacion_Trol1]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tasignacion]  WITH CHECK ADD  CONSTRAINT [FK_Tasignacion_Trol1] FOREIGN KEY([id_rol])
REFERENCES [dbo].[Trol] ([id_rol])
GO
ALTER TABLE [dbo].[Tasignacion] CHECK CONSTRAINT [FK_Tasignacion_Trol1]
GO
/****** Object:  ForeignKey [FK_Tasignacion_Tsistema1]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tasignacion]  WITH CHECK ADD  CONSTRAINT [FK_Tasignacion_Tsistema1] FOREIGN KEY([id_sistema])
REFERENCES [dbo].[Tsistema] ([id_sistema])
GO
ALTER TABLE [dbo].[Tasignacion] CHECK CONSTRAINT [FK_Tasignacion_Tsistema1]
GO
/****** Object:  ForeignKey [FK_Tasignacion_Tusuario1]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tasignacion]  WITH CHECK ADD  CONSTRAINT [FK_Tasignacion_Tusuario1] FOREIGN KEY([id_usu])
REFERENCES [dbo].[Tusuario] ([id_usu])
GO
ALTER TABLE [dbo].[Tasignacion] CHECK CONSTRAINT [FK_Tasignacion_Tusuario1]
GO
/****** Object:  ForeignKey [FK_tipo_link_Tsistema]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[tipo_link]  WITH CHECK ADD  CONSTRAINT [FK_tipo_link_Tsistema] FOREIGN KEY([id_sistema])
REFERENCES [dbo].[Tsistema] ([id_sistema])
GO
ALTER TABLE [dbo].[tipo_link] CHECK CONSTRAINT [FK_tipo_link_Tsistema]
GO
/****** Object:  ForeignKey [FK_Tlinks_tipo_link]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tlinks]  WITH CHECK ADD  CONSTRAINT [FK_Tlinks_tipo_link] FOREIGN KEY([id_tlink])
REFERENCES [dbo].[tipo_link] ([id_tlink])
GO
ALTER TABLE [dbo].[Tlinks] CHECK CONSTRAINT [FK_Tlinks_tipo_link]
GO
/****** Object:  ForeignKey [FK_Tlinks_Trol]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tlinks]  WITH CHECK ADD  CONSTRAINT [FK_Tlinks_Trol] FOREIGN KEY([id_rol])
REFERENCES [dbo].[Trol] ([id_rol])
GO
ALTER TABLE [dbo].[Tlinks] CHECK CONSTRAINT [FK_Tlinks_Trol]
GO
/****** Object:  ForeignKey [FK_Trol_Tsistema]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Trol]  WITH CHECK ADD  CONSTRAINT [FK_Trol_Tsistema] FOREIGN KEY([id_sistema])
REFERENCES [dbo].[Tsistema] ([id_sistema])
GO
ALTER TABLE [dbo].[Trol] CHECK CONSTRAINT [FK_Trol_Tsistema]
GO
/****** Object:  ForeignKey [FK_Tusuario_dependencia]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tusuario]  WITH CHECK ADD  CONSTRAINT [FK_Tusuario_dependencia] FOREIGN KEY([id_dependencia])
REFERENCES [dbo].[dependencia] ([id_dependencia])
GO
ALTER TABLE [dbo].[Tusuario] CHECK CONSTRAINT [FK_Tusuario_dependencia]
GO
/****** Object:  ForeignKey [FK_Tusuario_Trol]    Script Date: 11/18/2016 14:10:02 ******/
ALTER TABLE [dbo].[Tusuario]  WITH CHECK ADD  CONSTRAINT [FK_Tusuario_Trol] FOREIGN KEY([id_rol])
REFERENCES [dbo].[Trol] ([id_rol])
GO
ALTER TABLE [dbo].[Tusuario] CHECK CONSTRAINT [FK_Tusuario_Trol]
GO
