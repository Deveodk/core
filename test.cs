using System;

using System.IO;

using System.Xml;

using System.Net;

using System.Net.Cache;

using System.Security.Cryptography.X509Certificates;

using System.Net.Security;

 

namespace CBFileTransfer

{

    public class CBFileTransfer

    {

        private Stream _data { get; set; }

        private int _chunkSize { get; set; }

        private long _fileSize { get; set; }

        private string _transferID { get; set; }

        private string _xdlUrl { get; set; }

        private static string _appID = "92272407-e044-42da-9985-eeb85e0ce644";

 

        public CBFileTransfer(string url)

        {

            _xdlUrl = url;

        }

 

        public string SendFile(Stream data)

        {

            _data = data;

            _fileSize = data.Length;

            if (_fileSize == 0)

                throw new Exception("Kan ikke sende tomme filer");

            TransferNew();

            while (_data.Position < _fileSize)

                TransferSend();

            return _transferID;

        }

 

        private void TransferNew()

        {

            XmlDocument XmlDoc = CreateRootXml();

            XmlElement TransferNewNode = XmlDoc.CreateElement("XDLFileTransferNew");

            XmlElement FileSizeNode = XmlDoc.CreateElement("fileSize");

            FileSizeNode.InnerText = _fileSize.ToString();

            XmlDoc.LastChild.AppendChild(TransferNewNode);

            TransferNewNode.AppendChild(FileSizeNode);

            SendToXDL(_xdlUrl, XmlDoc);

            _transferID = XmlDoc.SelectSingleNode("response/XDLFileTransferNew/transferId").InnerText;

            _chunkSize = Convert.ToInt32(XmlDoc.SelectSingleNode("response/XDLFileTransferNew/chunkSize").InnerText);

        }

 

        private static XmlDocument CreateRootXml()

        {

            XmlDocument Result = new XmlDocument();

            XmlDeclaration xdecl;

            xdecl = Result.CreateXmlDeclaration("1.0", null, null);

            xdecl.Encoding = "ISO-8859-1";

            Result.AppendChild(xdecl);

 

            XmlElement rootEle = Result.CreateElement("request");

            XmlAttribute appIDAtt = Result.CreateAttribute("appID");

            appIDAtt.Value = _appID;

            rootEle.Attributes.Append(appIDAtt);

            Result.AppendChild(rootEle);

 

            return Result;

        }

 

        private void TransferSend()

        {

            XmlDocument xmlDoc = CreateRootXml();

            XmlElement transferSendNode = xmlDoc.CreateElement("XDLFileTransferSend");

            XmlElement transferIdNode = xmlDoc.CreateElement("transferId");

            XmlElement offsetNode = xmlDoc.CreateElement("offset");

            XmlElement dataNode = xmlDoc.CreateElement("data");

 

            transferIdNode.InnerText = _transferID;

            offsetNode.InnerText = _data.Position.ToString();

            dataNode.InnerText = NextChunkAsHexString();

 

            xmlDoc.LastChild.AppendChild(transferSendNode);

            transferSendNode.AppendChild(transferIdNode);

            transferSendNode.AppendChild(offsetNode);

            transferSendNode.AppendChild(dataNode);

            SendToXDL(_xdlUrl, xmlDoc);

        }

 

        private string NextChunkAsHexString()

        {

            byte[] chunkBinary = new byte[_chunkSize];

            long length = _data.Read(chunkBinary, 0, _chunkSize);

            return HexStr(chunkBinary, length);

        }

 

        public static string HexStr(byte[] p, long length)

        {

            char[] c = new char[length * 2];

            byte b;

            for (int y = 0, x = 0; y < length; ++y, ++x)

            {

                b = ((byte)(p[y] >> 4));

                c[x] = (char)(b > 9 ? b + 0x37 : b + 0x30);

                b = ((byte)(p[y] & 0xF));

                c[++x] = (char)(b > 9 ? b + 0x37 : b + 0x30);

            }

            return new string(c);

        }

 

        private void SendToXDL(String url, XmlDocument xmlDoc, int timeoutSeconds = -1)

        {

            ServicePointManager.ServerCertificateValidationCallback += OnServerCertificateValidation;

            try

            {

                HttpWebRequest request = (HttpWebRequest)HttpWebRequest.Create(url);

                if (timeoutSeconds > 0)

                {

                    request.Timeout = timeoutSeconds * 1000;

                }

                request.Method = "POST";

                request.ContentType = "text/xml";

                request.CachePolicy = new RequestCachePolicy(RequestCacheLevel.NoCacheNoStore);

                xmlDoc.Save(request.GetRequestStream());

                using (HttpWebResponse res = (HttpWebResponse)request.GetResponse())

                {

                    xmlDoc.Load(res.GetResponseStream());

                }

            }

            finally

            {

                ServicePointManager.ServerCertificateValidationCallback -= OnServerCertificateValidation;

            }

        }

 

        private bool OnServerCertificateValidation(object sender, X509Certificate certificate, X509Chain chain, SslPolicyErrors sslPolicyErrors)

        {

            return true;

        }

 

    }

}

