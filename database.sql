USE [QL_SVTT]
GO
/****** Object:  Table [dbo].[khoaTT]    Script Date: 02/06/2023 4:49:15 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[khoaTT](
	[makhoa] [varchar](10) NOT NULL,
	[ngayBD] [date] NULL,
	[ngayKT] [date] NULL,
 CONSTRAINT [PK_khoaTT] PRIMARY KEY CLUSTERED 
(
	[makhoa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[nhanvien]    Script Date: 02/06/2023 4:49:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[nhanvien](
	[id] [int] NOT NULL,
	[manv] [varchar](10) NULL,
	[hoten] [nvarchar](50) NULL,
	[ngaysinh] [date] NULL,
	[sdt] [char](10) NULL,
	[diachi] [nvarchar](100) NULL,
	[chucvu] [nvarchar](50) NULL,
	[email] [varchar](100) NULL,
	[gioitinh] [nvarchar](4) NULL,
	[maphongban] [int] NULL,
	[matkhau] [varchar](156) NULL,
 CONSTRAINT [PK_nhanvien] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[phongban]    Script Date: 02/06/2023 4:49:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[phongban](
	[maphongban] [int] NOT NULL,
	[tenphongban] [nvarchar](50) NULL,
	[phongbancha] [int] NULL,
 CONSTRAINT [PK_phongban] PRIMARY KEY CLUSTERED 
(
	[maphongban] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sinhvien]    Script Date: 02/06/2023 4:49:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sinhvien](
	[mssv] [varchar](8) NOT NULL,
	[hoten] [nvarchar](50) NULL,
	[ngaysinh] [date] NULL,
	[diachi] [nvarchar](100) NULL,
	[sdt] [char](10) NULL,
	[email] [varchar](100) NULL,
	[gioitinh] [nvarchar](4) NULL,
	[matruong] [varchar](10) NULL,
	[makhoa] [varchar](10) NULL,
	[bangdiem] [varchar](200) NULL,
	[diemTB] [float] NULL,
	[ketqua] [nvarchar](500) NULL,
	[noidungTT] [nvarchar](500) NULL,
	[id] [int] NULL,
 CONSTRAINT [PK_sinhvien] PRIMARY KEY CLUSTERED 
(
	[mssv] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[thaotac]    Script Date: 02/06/2023 4:49:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[thaotac](
	[id] [int] NULL,
	[capnhat] [nvarchar](100) NULL,
	[thoidiem] [datetime] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[trangthai]    Script Date: 02/06/2023 4:49:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[trangthai](
	[trangthai] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[truong]    Script Date: 02/06/2023 4:49:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[truong](
	[matruong] [varchar](10) NOT NULL,
	[tentruong] [nvarchar](50) NULL,
 CONSTRAINT [PK_truongw] PRIMARY KEY CLUSTERED 
(
	[matruong] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K1', CAST(N'2020-06-01' AS Date), CAST(N'2020-07-26' AS Date))
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K2', CAST(N'2021-05-31' AS Date), CAST(N'2021-07-25' AS Date))
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K3', CAST(N'2022-05-23' AS Date), CAST(N'2022-07-17' AS Date))
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K4', CAST(N'2023-05-15' AS Date), CAST(N'2023-07-09' AS Date))
GO
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (1, N'NV01', N'Mai XuÃ¢n Tá»©', CAST(N'2023-05-03' AS Date), N'0926737826', N'SÃ³c TrÄƒng', N'NhÃ¢n viÃªn', N'tu09@gmail.com', N'Nam', 1, N'$argon2id$v=19$m=65536,t=4,p=1$QmNua1lyUTBmTlUyanpMVQ$mf3H8aU0qBORtvAk7Ar2JEMAVffhdbI0LxvIAwYfkvo')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (2, N'NV02', N'Minh Minh TÃ¢n', CAST(N'2023-05-05' AS Date), N'0926737821', N'HÃ  Ná»™i', N'NhÃ¢n viÃªn', N'ltan@gmail.com', N'Nam', 2, N'$argon2id$v=19$m=65536,t=4,p=1$S3VzTU5XODNHT0JmOXNLSg$VE1pz4GUzdOel19ldz6DLAz5eukN7blxQxZ4FTpTThc')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (3, N'NV03', N'Ngá»c Thanh TÃ¢m', CAST(N'2023-05-06' AS Date), N'0935171137', N'Cáº§n ThÆ¡', N'NhÃ¢n viÃªn', N'tam@gmail.com', N'Ná»¯', 4, N'$argon2id$v=19$m=65536,t=4,p=1$ZzFBa25nUEtqTm1wQUtZRg$VluERzMaWCo7p33HTHME+/GwJXwymjfmHZauowyVukY')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (4, N'NV04', N'Ngá»c Thanh TÃ¢m', CAST(N'2023-06-16' AS Date), N'0926737825', N'SÃ³c TrÄƒng', N'NhÃ¢n viÃªn', N'tam@gmail.come', N'Nam', 9, N'$argon2id$v=19$m=65536,t=4,p=1$M2lvb0VFWXh5YlVjYmM0Lg$aK38yb1Smwm6rEAvvqyG1LdM9ZCqwDlGgmo4I6T5aGU')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (5, N'NV05', N'Nguyá»…n Há»¯u Quá»›i', CAST(N'2023-05-19' AS Date), N'0935171138', N'HÃ  Ná»™i', N'NhÃ¢n viÃªn', N'quoi09@gmail.com', N'Nam', 4, N'$argon2id$v=19$m=65536,t=4,p=1$UDVPUDN5VmgxUnZ1aU45Zw$TCcYwZvsd4hOnsm4B+06dyboWPnE3UVwvLpRsJX6izA')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (6, N'NV06', N'Huá»³nh Thanh PhÆ°á»›c', CAST(N'2023-05-11' AS Date), N'0935171132', N'KiÃªn Giang', N'NhÃ¢n viÃªn', N'phuoc05@gmail.com', N'Nam', 4, N'$argon2id$v=19$m=65536,t=4,p=1$TC4yMi9ITnl0ZnlXTHR5SA$aZCKjLLaaGPRqvKqMWgRmIO3QuTK7J8740B0SU3jils')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (7, N'NV07', N'Minh Minh TÃ¢n', CAST(N'2023-06-22' AS Date), N'0926737845', N'HÃ  Ná»™i', N'NhÃ¢n viÃªn', N'lad09@gmail.com', N'Nam', 10, N'$argon2id$v=19$m=65536,t=4,p=1$U1NweFFpNVpTZEd5ZEMuLw$8LPr8KuiVGcSUhPyFJP8kzXwTB6/8pWk0Jsg5VTCrVs')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (8, N'NV08', N'Minh Minh TÃ¢n', CAST(N'2023-06-05' AS Date), N'0926737842', N'KiÃªn Giang', N'NhÃ¢n viÃªn admin', N'hai@gmail.mn', N'Ná»¯', 4, N'$argon2id$v=19$m=65536,t=4,p=1$QU5vdEVPaVdJU3lVSEZhNw$8aQb4gsqRU6JNezkFE1nNxU6xfEeMn8pRmel2D8qpKw')
GO
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (1, N'Ban giám đốc', NULL)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (2, N'Phòng kinh doanh', NULL)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (3, N'Phòng giải pháp', NULL)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (4, N'Tổ tổng hợp', 2)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (5, N'Tổ triển khai - chăm sóc khách hàng (CSKH)', 2)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (6, N'Tổ văn thư TTCNTT', 2)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (7, N'Tổ giải pháp CQS', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (8, N'Tổ quản trị hệ thống CNTT', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (9, N'Tổ camera', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (10, N'Tổ nghiên cứu và phát triển (R&D)', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (11, N'Tổ hệ thống thông tin địa lý (Gis)', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (12, N'Tổ thanh tra, khiểu nại, tố cáo', 3)
GO
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1606783', N'Trần Thu Hà', CAST(N'1998-07-03' AS Date), N'Sóc Trăng', N'0917345895', N'ha03@gmail.com', N'nữ', N'CTU', N'K1', NULL, 3.78, NULL, NULL, 1)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1634567', N'Nguyễn Như Anh', CAST(N'1998-02-05' AS Date), N'Cần Thơ', N'0917516378', N'anh05@gmail.com', N'nữ', N'CTU', N'K1', NULL, 3.16, NULL, NULL, 2)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1657894', N'Danh Hoàng Khanh', CAST(N'1999-01-01' AS Date), N'Bạc Liêu', N'0780626789', N'khang01@gmail.com', N'nam', N'DVT', N'K1', NULL, 3.8, NULL, NULL, 2)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1736789', N'Tạ Kinh Lâm', CAST(N'1999-07-02' AS Date), N'Trà Vinh', N'0967253416', N'lam02@gmail.com', N'nam', N'DVT', N'K2', NULL, 2.6, NULL, NULL, 3)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1795432', N'Lâm Tâm Như', CAST(N'2000-06-09' AS Date), N'Cà Mau', N'0917245671', N'nhu09@gmail.com', N'nữ', N'DVL', N'K2', NULL, 3.9, NULL, NULL, 3)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1852782', N'Nguyễn Trường Minh', CAST(N'2000-05-21' AS Date), N'Tiền Giang', N'0924622728', N'minh21@gmail.com', N'nam', N'TTG', N'K3', NULL, 3.2, NULL, NULL, 1)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1890245', N'Lý Giáng Xuân', CAST(N'2000-08-14' AS Date), N'An Giang', N'0917254467', N'xuan14@gmail.com', N'nữ', N'CTU', N'K3', NULL, 3.4, NULL, NULL, 3)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1895267', N'Tống Huy Long', CAST(N'2000-09-05' AS Date), N'Hậu Giang', N'0952717638', N'long05@gmail.com', N'nam', N'CTU', N'K3', NULL, 2.8, NULL, NULL, 2)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1906427', N'Phạm Quỳnh Anh', CAST(N'2001-08-21' AS Date), N'An Giang', N'0866563661', N'anh21@gmail.com', N'nữ', N'CTU', N'K4', NULL, 4, NULL, NULL, 4)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1967437', N'Tống Ái Ninh', CAST(N'2001-08-08' AS Date), N'Long An', N'0925278168', N'ninh08@gmai.com', N'nữ', N'DVL', N'K4', NULL, 2.9, NULL, NULL, 4)
GO
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'CTU', N'Trường Đại học Cần Thơ')
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'DVL', N'Trường Đại học Văn Lang')
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'DVT', N'Trường Đại học Trà Vinh')
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'TTG', N'Trường Đại học Tiền Giang')
GO
ALTER TABLE [dbo].[nhanvien]  WITH CHECK ADD  CONSTRAINT [FK_nhanvien_phongban] FOREIGN KEY([maphongban])
REFERENCES [dbo].[phongban] ([maphongban])
GO
ALTER TABLE [dbo].[nhanvien] CHECK CONSTRAINT [FK_nhanvien_phongban]
GO
ALTER TABLE [dbo].[sinhvien]  WITH CHECK ADD  CONSTRAINT [FK_sinhvien_khoaTT] FOREIGN KEY([makhoa])
REFERENCES [dbo].[khoaTT] ([makhoa])
GO
ALTER TABLE [dbo].[sinhvien] CHECK CONSTRAINT [FK_sinhvien_khoaTT]
GO
ALTER TABLE [dbo].[sinhvien]  WITH CHECK ADD  CONSTRAINT [FK_sinhvien_nhanvien] FOREIGN KEY([id])
REFERENCES [dbo].[nhanvien] ([id])
GO
ALTER TABLE [dbo].[sinhvien] CHECK CONSTRAINT [FK_sinhvien_nhanvien]
GO
ALTER TABLE [dbo].[sinhvien]  WITH CHECK ADD  CONSTRAINT [FK_sinhvien_truong] FOREIGN KEY([matruong])
REFERENCES [dbo].[truong] ([matruong])
GO
ALTER TABLE [dbo].[sinhvien] CHECK CONSTRAINT [FK_sinhvien_truong]
GO
ALTER TABLE [dbo].[thaotac]  WITH CHECK ADD  CONSTRAINT [FK_thaotac_nhanvien] FOREIGN KEY([id])
REFERENCES [dbo].[nhanvien] ([id])
GO
ALTER TABLE [dbo].[thaotac] CHECK CONSTRAINT [FK_thaotac_nhanvien]
GO
