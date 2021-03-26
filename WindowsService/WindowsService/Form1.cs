using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.ServiceModel;
using System.ServiceModel.Description;
using WcfServiceLibrary;

namespace WindowsService
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }


        private ServiceHost m_pHost;

        private void Form1_Load(object sender, EventArgs e)
        {
            string sUrlService = "http://127.0.0.1:8000/Service";
            string sUrlServiceMeta = "http://127.0.0.1:8000/Service/Meta";
            // Привязка для основного сервиса
            BasicHttpBinding pBinding = new BasicHttpBinding();
            pBinding.Security.Transport.ClientCredentialType =
           HttpClientCredentialType.None;
            pBinding.Security.Mode = BasicHttpSecurityMode.None;
            // Поведение для публикации информации о сервисе
            ServiceMetadataBehavior smb = new ServiceMetadataBehavior();
            smb.HttpGetEnabled = true;
            smb.HttpGetUrl = new Uri(sUrlServiceMeta);
            smb.MetadataExporter.PolicyVersion = PolicyVersion.Policy15;
            // Создаем хост
            m_pHost = new ServiceHost(typeof(Service));
            m_pHost.Description.Behaviors.Add(smb);
            // Добавляем обслуживание основного функционала
            m_pHost.AddServiceEndpoint(typeof(IService), pBinding, sUrlService);
            // Добавляем обслуживание публикации информации о сервисе
            m_pHost.AddServiceEndpoint(typeof(IMetadataExchange),
           MetadataExchangeBindings.CreateMexHttpBinding(), sUrlServiceMeta);
        }

        private void button1_Click(object sender, EventArgs e)
        {
            m_pHost.Open();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            m_pHost.Close();
        }
    }
}
