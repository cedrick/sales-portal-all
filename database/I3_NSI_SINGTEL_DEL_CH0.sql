if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[I3_NSI_SINGTEL_DEL_CH0]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[I3_NSI_SINGTEL_DEL_CH0]
GO

CREATE TABLE [dbo].[I3_NSI_SINGTEL_DEL_CH0] (
	[workflowname] [varchar] (255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL ,
	[campaignname] [varchar] (255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL ,
	[siteid] [varchar] (80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL ,
	[i3_identity] [bigint] NULL ,
	[i3_rowid] [varchar] (80) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
	[reason] [varchar] (80) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL ,
	[finishcode] [varchar] (255) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL ,
	[length] [int] NULL ,
	[agentid] [varchar] (80) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
	[callid] [char] (11) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
	[callidkey] [char] (18) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
	[phonenumber] [varchar] (50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
	[callplacedtime] [datetime] NULL ,
	[callansweredtime] [datetime] NULL ,
	[messageplaytime] [datetime] NULL ,
	[callconnectedtime] [datetime] NULL ,
	[calldisconnectedtime] [datetime] NULL ,
	[previewpoptime] [datetime] NULL ,
	[callingmode] [int] NULL ,
	[isabandoned] [int] NULL ,
	[iscontact] [int] NULL 
) ON [PRIMARY]
GO

