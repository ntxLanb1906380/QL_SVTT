USE [QL_SVTT]
GO
/****** Object:  Table [dbo].[khoaTT]    Script Date: 05/07/2023 10:29:41 AM ******/
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
/****** Object:  Table [dbo].[nhanvien]    Script Date: 05/07/2023 10:29:41 AM ******/
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
/****** Object:  Table [dbo].[phongban]    Script Date: 05/07/2023 10:29:41 AM ******/
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
/****** Object:  Table [dbo].[sinhvien]    Script Date: 05/07/2023 10:29:41 AM ******/
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
/****** Object:  Table [dbo].[thaotac]    Script Date: 05/07/2023 10:29:41 AM ******/
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
/****** Object:  Table [dbo].[trangthai]    Script Date: 05/07/2023 10:29:41 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[trangthai](
	[trangthai] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[truong]    Script Date: 05/07/2023 10:29:41 AM ******/
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
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K1', CAST(N'2020-06-02' AS Date), CAST(N'2020-07-27' AS Date))
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K2', CAST(N'2021-05-31' AS Date), CAST(N'2021-07-25' AS Date))
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K3', CAST(N'2022-05-23' AS Date), CAST(N'2022-07-17' AS Date))
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K4', CAST(N'2023-05-15' AS Date), CAST(N'2023-07-09' AS Date))
INSERT [dbo].[khoaTT] ([makhoa], [ngayBD], [ngayKT]) VALUES (N'K5', CAST(N'2024-05-23' AS Date), CAST(N'2024-07-17' AS Date))
GO
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (1, N'NV01', N'Mai XuÃ¢n Tá»©', CAST(N'1987-06-10' AS Date), N'0926737826', N'Cáº§n ThÆ¡', N'GiÃ¡m Ä‘á»‘c', N'tu09@gmail.com', N'Nam', 1, N'$argon2id$v=19$m=65536,t=4,p=1$bWt5NTdzL0I3VzdsV3NGRA$YmLk7RE5O1bcsKdZLICnE3nq39RWDkZyMBwGgXBFFtA')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (2, N'NV02', N'Minh Minh TÃ¢n', CAST(N'2023-05-05' AS Date), N'0926737821', N'HÃ  Ná»™i', N'NhÃ¢n viÃªn', N'ltan@gmail.com', N'Nam', 2, N'$argon2id$v=19$m=65536,t=4,p=1$eElaaFZpaVE2VVRDakwxeA$/dHjokm4haYVGmF4Yz61dsdl/IFg/f38MMKv2UwBK64')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (3, N'NV03', N'Ngá»c Thanh TÃ¢m', CAST(N'2023-05-06' AS Date), N'0935171137', N'Cáº§n ThÆ¡', N'NhÃ¢n viÃªn', N'tam@gmail.com', N'Nam', 4, N'$argon2id$v=19$m=65536,t=4,p=1$ZVl1TDNRWml6a0hRZFJpWg$+z7ePUERTxZ4aJWxAvkkOx2Q6IHGLz+Qv659XKW+7ns')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (4, N'NV04', N'Ngá»c Thanh Thanh', CAST(N'2023-06-16' AS Date), N'0926737825', N'SÃ³c TrÄƒng', N'NhÃ¢n viÃªn', N'tam@gmail.come', N'Nam', 9, N'$argon2id$v=19$m=65536,t=4,p=1$eXg4am1Qd0IvTjNPanVRWA$sIvI2Vv5sF+JpXjim5OHQ2qZDlwLt+qxnAiSdivO2WI')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (5, N'NV05', N'Nguyá»…n Há»¯u Quá»›i', CAST(N'2023-05-19' AS Date), N'0935171138', N'HÃ  Ná»™i', N'NhÃ¢n viÃªn', N'quoi09@gmail.com', N'Nam', 4, N'$argon2id$v=19$m=65536,t=4,p=1$UDVPUDN5VmgxUnZ1aU45Zw$TCcYwZvsd4hOnsm4B+06dyboWPnE3UVwvLpRsJX6izA')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (7, N'NV07', N'Minh Minh La', CAST(N'2023-06-22' AS Date), N'0926737845', N'HÃ  Ná»™i', N'NhÃ¢n viÃªn', N'lad09@gmail.com', N'Nam', 10, N'$argon2id$v=19$m=65536,t=4,p=1$ZFZySmd2Vk5UbkxOajJqRw$jCWs3JRyrKea15e7c0Q7+n3bdcBqR4YY7RURupeW7wg')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (8, N'NV08', N'Minh Minh TÃ i', CAST(N'2023-06-09' AS Date), N'0926737841', N'KiÃªn Giang', N'NhÃ¢n viÃªn', N'ha879@gmail.mn', N'Nam', 5, N'$argon2id$v=19$m=65536,t=4,p=1$a2V5aVZ6MTVxVVNyTmNTNg$rwoAPUO6UvoW5JMvXrdDXyrT+YHN8GppTew5YGnEZh8')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (9, N'NV09', N'Nguyá»…n Ngá»c Ngáº¡n', CAST(N'2023-02-03' AS Date), N'0926737811', N'TrÃ  Vinh', N'NhÃ¢n viÃªn', N'ngan@gmail.com', N'Ná»¯', 4, N'$argon2id$v=19$m=65536,t=4,p=1$eUhQS0Z3TE5OdHhZNmdQZA$7KGNj1efObYDa7OXRtrl7wjIogrAhqPRCafQfmxInfo')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (10, N'NV10', N'Mai XuÃ¢n Tam', CAST(N'2023-03-03' AS Date), N'0920000000', N'KiÃªn Giang', N'NhÃ¢n viÃªn admin', N'tu10@gmail.com', N'Nam', 7, N'$argon2id$v=19$m=65536,t=4,p=1$cmVraGozRTZvN1F3Zi5TdQ$Dnmbzwmay+tiC5bnwxOHGjoyj2qpIzkFUcrfzZf9/+E')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (11, N'NV11', N'Fong Suka', CAST(N'2023-06-15' AS Date), N'0911111111', N'An Giang', N'NhÃ¢n viÃªn', N'suka@gmail.com', N'Nam', 8, N'$argon2id$v=19$m=65536,t=4,p=1$cGtaaXV6V2tJMTl4bjhVcQ$AkVgJ1dgU4TP5VWQdpkJrpJXSaFJFiKjyNAWXDjEyRQ')
INSERT [dbo].[nhanvien] ([id], [manv], [hoten], [ngaysinh], [sdt], [diachi], [chucvu], [email], [gioitinh], [maphongban], [matkhau]) VALUES (12, N'NV12', N'Tráº§n Ngá»c HoÃ i', CAST(N'2023-03-10' AS Date), N'0922222222', N'CÃ  Mau', N'NhÃ¢n viÃªn', N'hoai@gmail', N'Nam', 11, N'$argon2id$v=19$m=65536,t=4,p=1$VkxGbVJlTU4zSFdNRWpxUg$lj58AN7Ej01FHtljMDl9uqTY0xBn4791UYkpUSTT7B0')
GO
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (1, N'Ban giÃ¡m Ä‘á»‘c', NULL)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (2, N'PhÃ²ng kinh doanh', NULL)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (3, N'PhÃ²ng giáº£i phÃ¡p', NULL)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (4, N'Tá»• Tá»•ng há»£p', 2)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (5, N'Tá»• Triá»ƒn khai - ChÄƒm sÃ³c khÃ¡ch hÃ ng (CSKH)', 2)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (6, N'VÄƒn thÆ° TTCNTT', 2)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (7, N'Tá»• Giáº£i phÃ¡p CQS', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (8, N'Tá»• Quáº£n trá»‹ há»‡ thá»‘ng CNTT', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (9, N'Tá»• Camera', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (10, N'Tá»• NghiÃªn cá»©u vÃ  phÃ¡t triá»ƒn (R&D)', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (11, N'Tá»• Há»‡ thá»‘ng thÃ´ng tin Ä‘á»‹a lÃ½ (Gis)', 3)
INSERT [dbo].[phongban] ([maphongban], [tenphongban], [phongbancha]) VALUES (12, N'Tá»• Thanh tra, Khiáº¿u náº¡i, Tá»‘ cÃ¡o', 3)
GO
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1606783', N'Tráº§n Thu HÃ ', CAST(N'1998-07-02' AS Date), N'SÃ³c TrÄƒng', N'0917345895', N'ha03@gmail.com', N'Nam', N'CTU', N'K1', N'', 3.78, N'gngn: 9.2', N'dgge', 4)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1634567', N'Nguyá»…n NhÆ° Anh', CAST(N'1998-02-05' AS Date), N'Cáº§n ThÆ¡', N'0917516378', N'anh05@gmail.com', N'Ná»¯', N'CTU', N'K1', N'../bangdiemSV/ketqua.pdf', 3.16, N'gngn: 8.9', N'jyjft', 5)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1657894', N'Äáº·ng HoÃ ng Khanh', CAST(N'1999-01-01' AS Date), N'Báº¡c LiÃªu', N'0780626789', N'khang01@gmail.com', N'Nam', N'DVT', N'K1', N'', 3.8, N'gngn: 8.9', N'jyjft', 4)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1736789', N'Táº¡ Kinh LÃ¢m', CAST(N'1999-07-02' AS Date), N'TrÃ  Vinh', N'0967253416', N'lam02@gmail.com', N'Nam', N'DVT', N'K2', N'', 2.6, N'gngn: 8.9', N'jyjft', 5)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1795432', N'LÃ¢m TÃ¢m NhÆ°', CAST(N'2000-06-09' AS Date), N'CÃ  Mau', N'0917245671', N'nhu09@gmail.com', N'Ná»¯', N'DVL', N'K2', N'', 3.9, N'gngn: 9', N'jyjft', 9)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1852782', N'Nguyá»…n TrÆ°á»ng Minh', CAST(N'2000-05-21' AS Date), N'Tiá»n Giang', N'0924622728', N'minh21@gmail.com', N'Nam', N'TTG', N'K3', N'', 3.2, N'gngn: 9', N'grggrer', 9)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1890245', N'LÃ½ Lam', CAST(N'2000-08-14' AS Date), N'An Giang', N'0917254467', N'xuan14@gmail.com', N'Nam', N'CTU', N'K3', N'../bangdiemSV/bangdiem.pdf', 3.4, N'gngn: 9.5', N'fghd', 11)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1895267', N'Tá»‘ng Huy Long', CAST(N'2000-09-05' AS Date), N'Háº­u Giang', N'0952717638', N'long05@gmail.com', N'Nam', N'CTU', N'K3', N'', 2.8, N'gngn: 8.9', N'jyjft', 12)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1906339', N'Nguyá»…n ThÃºy Vy', CAST(N'2023-06-02' AS Date), N'KiÃªn Giang', N'0123456789', N'thuyvy@gmail.com', N'Ná»¯', N'TTG', N'K4', N'../bangdiemSV/bangdiem.pdf', 3.2, N'gngn: 8.9', N'ggegw', 9)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1906427', N'LÃ½ Minh', CAST(N'2023-03-16' AS Date), N'SÃ³c TrÄƒng', N'0926737923', N'minhminh@gmail.com', N'Nam', N'DVT', N'K5', N'', 2.9, N'', N'', 4)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1906440', N'LÃª Minh HÃ²a', CAST(N'2023-06-01' AS Date), N'Cáº§n ThÆ¡', N'0926737836', N'hoa09@gmail.com', N'Nam', N'DVT', N'K4', N'../bangdiemSV/ketqua.pdf', 2.9, N'gngn: 10', N'jyjft', 11)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1906444', N'LÃª Minh', CAST(N'2023-04-28' AS Date), N'CÃ  Mau', N'0926737833', N'minh00@gmail.com', N'Nam', N'DVL', N'K4', N'../bangdiemSV/bangdiem.pdf', 3.2, N'gngn: 9', N'jyjft', 7)
INSERT [dbo].[sinhvien] ([mssv], [hoten], [ngaysinh], [diachi], [sdt], [email], [gioitinh], [matruong], [makhoa], [bangdiem], [diemTB], [ketqua], [noidungTT], [id]) VALUES (N'B1906460', N'Minh Minh Ka', CAST(N'2023-06-02' AS Date), N'Cáº§n ThÆ¡', N'0926737888', N'KaKa@gmail.com', N'Nam', N'DVL', N'K4', N'../bangdiemSV/ketqua.pdf', 3, N'gngn: 9', N'jyjft', 7)
GO
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'CTU', N'TrÆ°á»ng Äáº¡i Há»c Cáº§n ThÆ¡')
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'DVL', N'TrÆ°á»ng Äáº¡i Há»c VÄƒn Lang')
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'DVT', N'TrÆ°á»ng Äáº¡i Há»c TrÃ  Vinh')
INSERT [dbo].[truong] ([matruong], [tentruong]) VALUES (N'TTG', N'TrÆ°á»ng Äáº¡i Há»c Tiá»n Giang')
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
